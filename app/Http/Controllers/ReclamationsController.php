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

class ReclamationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:etudiant')->only('create', 'store', 'etape');
        $this->middleware('auth:utilisateur')->only('index');
    }

    ##Fonction qui s'occupe de valider les demandes de reclamation
    public function validatorReclamation(array $data)
    {
        $validator = false;
        for($i = 1; $i <= $data['nombre']; $i++){
            if($i == 1){
                $validator = Validator::make($data, [
                    'code' => 'required|string|max:255',
                    'libelle' => 'required|string|max:255',
                    'note_obtenue' => 'required|string',
                    'note_reclame' => 'required|string|max:20',
                    'type_note' => 'required|string|max:255',
                ]);
            }else{
                $validator =  Validator::make($data, [
                    'code'.$i => 'required|string|max:255',
                    'libelle'.$i => 'required|string|max:255',
                    'note_obtenue'.$i => 'required|string',
                    'note_reclame'.$i => 'required|string|max:20',
                    'type_note'.$i => 'required|string|max:255',
                ]);
            }
            if(!$validator){
                break;
            }
        }
        return $validator;
    }

    /*
    *Cette fonction a pour but de contenir la requête de selection des reclamations
    *afin d'éviter les redondances d'une part -le seul paramètre variant étant etape_id- et
    *d'autre part de faciliter la modification de la requête et/ou sa mise à jour.
    */
    public function reclamations($etapeId){
        $utilisateur = Auth::user();
        $demandes = DB::select('
            SELECT DISTINCT r.id, e.name, e.first_name, u.code, u.type_note
            FROM reclamations r, demandes d, etudiants e, etapes et, unite_enseignements u
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND u.etape_id = '.$etapeId.'
            AND u.reclamation_id = r.id
            AND e.etablissement_id = '.$utilisateur->etablissement->id.'
            LIMIT 5
        ');
        return $demandes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateur = Auth::user();

        #Selectionner les demandes pr un ets donné
        $Rec_depots = $this->reclamations(10);
        $nRec_depots = count($Rec_depots);

        $Rec_verifications = $this->reclamations(11);
        $nRec_verifications = count($Rec_verifications);

        $Rec_traites = $this->reclamations(12);
        $nRec_traites = count($Rec_traites);

        return view('utilisateurs.admin-reclamations-recap', compact([
            'Rec_depots',
            'Rec_verifications',
            'Rec_traites',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etudiants.etu-reclamation-note');
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

        $donnees = $request->all();

        $this->validatorReclamation($donnees)->validate();
        #Creation de la reclamation
        $dr = Reclamation::create([]);

        #Creation de l'unite d'enseignement
        for($i = 1; $i <= $donnees['nombre']; $i++){
            if($i == 1){
                $dr->unite_enseignement()->create([
                    'code' => $donnees['code'],
                    'libelle' => $donnees['libelle'],
                    'note_obtenue' => $donnees['note_obtenue'],
                    'note_reclame' => $donnees['note_reclame'],
                    'type_note' => $donnees['type_note'],
                    'etape_id' => 8
                ]);
            }else{
                $dr->unite_enseignement()->create([
                    'code' => $donnees['code'.$i],
                    'libelle' => $donnees['libelle'.$i],
                    'note_obtenue' => $donnees['note_obtenue'.$i],
                    'note_reclame' => $donnees['note_reclame'.$i],
                    'type_note' => $donnees['type_note'.$i],
                    'etape_id' => 8
                ]);
            }
        }

        #Creation de la demande
        $dr->demande()->create([
            'demandeable_id' => $dr->id,
            'date_depot' => date('Y-m-d H:i:s'),
            'etat' => 'En cours',
            'etudiant_id' => $etudiant->id,
            'montant' => 2000 * $donnees['nombre'],
        ]);

        ##Doit declencher le middleware de payement et apres retour vers ?? apres retouner sur l'acceuil avec un message lui disant que la demande a été enregistré
        ##Le retour doit se faire sur une page avec le layout avk un msg "Votre demande de reclamation a ete bien enregistre"
        ##On fait un return back pour l'instant after on decidera quoi faire
        return redirect('/etudiants/reclamations/etapes');
    }

    public function etape()
    {
        $id = Auth::id();

        //Selection des ues en cours de traitment pour l'étudiant
        $ues = DB::select('SELECT DISTINCT ue.code, ue.libelle, ue.etape_id'
                             .' FROM unite_enseignements ue, reclamations r, demandes d'
                             .' WHERE r.id = d.demandeable_id'
                             .' AND d.etat = \'En cours\''
                             .' AND ue.reclamation_id = r.id'
                             .' AND d.etudiant_id = '.$id);

        return view('etudiants.etu-reclamation-etape', ['ues' => $ues]);
    }
}
