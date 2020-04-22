<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Etudiant;
use App\Releve;
use App\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RelevesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:etudiant')->only('create', 'store', 'etape');
        $this->middleware('auth:utilisateur')->only('index');
    }

    ##Fonction qui s'occupe de valider les demandes de releves
    protected function validatorReleve(array $data)
    {
        return Validator::make($data, [
            'type_releve' => 'required|string|max:255',
            'annee_du_releve' => 'required|string|max:255',
        ]);
    }

    /**
    *Cette fonction a pour but de contenir la requête de selection des releves
    *afin d'éviter les redondances d'une part -le seul paramètre variant étant etape_id- et
    *d'autre part de faciliter la modification de la requête et/ou sa mise à jour.
    */
    public function releves($etapeId){
        $utilisateur = Auth::user();
        $demandes = DB::select('
            SELECT DISTINCT r.id, e.name, e.first_name, r.annee_du_releve, r.type_releve
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND r.etape_id = '.$etapeId.'
            AND e.etablissement_id = '.$utilisateur->etablissement->id.'
            LIMIT 5'
        );
        return $demandes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rel_depots = $this->releves(3);
        $nRel_depots = count($Rel_depots);

        $Rel_impressions = $this->releves(4);
        $nRel_impressions = count($Rel_impressions);

        $Rel_verifications = $this->releves(5);
        $nRel_verifications = count($Rel_verifications);

        $Rel_signatures = $this->releves(6);
        $nRel_signatures = count($Rel_signatures);

        $Rel_traites = $this->releves(7);
        $nRel_traites = count($Rel_traites);

        return view('utilisateurs.admin-releves-recap', compact([
            'Rel_traites',
            'Rel_signatures',
            'Rel_verifications',
            'Rel_impressions',
            'Rel_depots',
            'nRel_depots',
            'nRel_traites',
            'nRel_verifications',
            'nRel_signatures',
            'nRel_impressions',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
        *Si l'etudiant a une demande en cours,
        *le bouton valider du formulaire est désactivé.
        */
        $id = Auth::id();

        $etat = DB::select('SELECT d.etat'
                             .' FROM demandes d'
                             .' WHERE d.etudiant_id = '.$id);
        if(isset($etat[0])){
            $etat = $etat[0];
        }

        return view('etudiants.etu-releve-note', ["etat" => $etat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etudiant = Auth::user();

        $this->validatorReleve($request->all())->validate();

        ///Les relevés définitifs sont gratuit donc seront à l'étape dépôt directement
        $etape_id = 1;
        $montant = 500;
        $payement = 0;
        $confirmation = 0;
        if($request->type_releve ==  "definitif"){
            $etape_id = 3;
            $montant = 0;
            $payement = 1;
            $confirmation = 1;
        }

        $dr = Releve::create([
                'annee_du_releve' => $request->annee_du_releve,
                'type_releve' => $request->type_releve,
                'etape_id' => $etape_id
            ]);

        ##creation de la demande
        $dr->demande()->create([
            'demandeable_id' => $dr->id,
            'date_depot' => date('Y-m-d H:i:s'),
            'etat' => 'En cours',
            'etudiant_id' => $etudiant->id,
            'montant' => $montant,
            'payement' => $payement,
            'confirmation' => $confirmation
        ]);

        ##Doit declencher le middleware de payement et apres retour vers ?? apres retouner sur l'acceuil avec un message lui disant que la demande a été enregistré
        ##Le retour doit se faire sur une page avec le layout avk un msg "Votre demande de releve a ete bien enregistre"
        ##On fait un return back pour l'instant after on decidera quoi faire

        return redirect('/etudiants/releves/etapes');
    }

    public function etape()
    {
        $id = Auth::id();

        //Selection de la demande de relevé en cours pour l'étudiant
        $releve = DB::select('SELECT r.type_releve, r.annee_du_releve, r.etape_id'
                             .' FROM releves r, demandes d'
                             .' WHERE r.id = d.demandeable_id'
                             .' AND d.montant BETWEEN 0 AND 500'
                             .' AND d.etat = \'En cours\''
                             .' AND d.etudiant_id = '.$id);
        if(isset($releve[0])){
            $releve = $releve[0];
        }

        return view('etudiants.etu-releve-etape', ['releve' => $releve]);
    }
}
