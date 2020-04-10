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
        $this->middleware('auth:etudiant')->only('create', 'store');

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateur = Auth::user();
        
        $Rel_depots = DB::select('
            SELECT r.id, e.name, e.first_name, r.annee_du_releve, r.type_releve
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND d.etape_id = et.id
            AND et.libelle = "Dépôt"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id.'
            LIMIT 5'
        );
        $nRel_depots = count($Rel_depots);

        $Rel_impressions = DB::select('
            SELECT r.id, e.name, e.first_name, r.annee_du_releve, r.type_releve
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND d.etape_id = et.id
            AND et.libelle = "Imprimé"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id.'
            LIMIT 5'
        );
        $nRel_impressions = count($Rel_impressions);

        $Rel_verifications = DB::select('
            SELECT r.id, e.name, e.first_name, r.annee_du_releve, r.type_releve
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND d.etape_id = et.id
            AND et.libelle = "Vérification"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id.'
            LIMIT 5'
        );
        $nRel_verifications = count($Rel_verifications);

        $Rel_signatures = DB::select('
            SELECT r.id, e.name, e.first_name, r.annee_du_releve, r.type_releve
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND d.etape_id = et.id
            AND et.libelle = "Signature"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id.'
            LIMIT 5'
        );
        $nRel_signatures = count($Rel_signatures);

        $Rel_traites = DB::select('
            SELECT r.id, e.name, e.first_name, r.annee_du_releve, r.type_releve
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND d.etape_id = et.id
            AND et.libelle = "Traité"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id.'
            LIMIT 5'
        );
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
        return view('etudiants.etu-releve-note');
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
        $dr = Releve::create([
                'annee_du_releve' => $request->annee_du_releve,
                'type_releve' => $request->type_releve,
            ]);

        ##creation de la demande
        $dr->demande()->create([
            'demandeable_id' => $dr->id,
            'date_depot' => date('Y-m-d H:i:s'),
            'etat' => 'En cours',
            'etudiant_id' => $etudiant->id,
            'etape_id' => 1,
        ]);

        ##Doit declencher le middleware de payement et apres retour vers ?? apres retouner sur l'acceuil avec un message lui disant que la demande a été enregistré
        ##Le retour doit se faire sur une page avec le layout avk un msg "Votre demande de releve a ete bien enregistre"
        ##On fait un return back pour l'instant after on decidera quoi faire

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Releve $releve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Releve $releve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Releve $releve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Releve $releve)
    {
        //
    }
}
