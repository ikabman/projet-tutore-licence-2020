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
        $this->middleware('auth:etudiant')->only('create', 'store');

        $this->middleware('auth:utilisateur')->only('index');
    }

    ##Fonction qui s'occupe de valider les demandes de reclamation
    public function validatorReclamation(array $data)
    {
        return Validator::make($data, [
            'code' => 'required|string|max:255',
            'libelle' => 'required|string|max:255',
            'note_obtenue' => 'required|string|max:20',
            'note_reclame' => 'required|string|max:20',
            'type_note' => 'required|string|max:255',
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

        #Selectionner les demandes pr un ets donné
        $Rec_depots = DB::select('
            SELECT r.id, e.name, e.first_name, u.code, u.type_note
            FROM reclamations r, demandes d, etudiants e, etapes et, unite_enseignements u
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND d.etape_id = et.id
            AND et.libelle = "Dépôt"
            AND et.type = "reclamation"
            AND u.reclamation_id = r.id
            AND e.etablissement_id = '.$utilisateur->etablissement->id.'
            LIMIT 5'
        );
        $nRec_depots = count($Rec_depots);


        $Rec_verifications = DB::select('
            SELECT r.id, e.name, e.first_name, u.code, u.type_note
            FROM reclamations r, demandes d, etudiants e, etapes et, unite_enseignements u
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND d.etape_id = et.id
            AND et.libelle = "Vérification"
            AND et.type = "reclamation"
            AND u.reclamation_id = r.id
            AND e.etablissement_id = '.$utilisateur->etablissement->id.'
            LIMIT 5'
        );
        $nRec_verifications = count($Rec_verifications);

        $Rec_traites = DB::select('
            SELECT r.id, e.name, e.first_name, u.code, u.type_note
            FROM reclamations r, demandes d, etudiants e, etapes et, unite_enseignements u
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND d.etape_id = et.id
            AND et.libelle = "Traité"
            AND et.type = "reclamation"
            AND u.reclamation_id = r.id
            AND e.etablissement_id = '.$utilisateur->etablissement->id.'
            LIMIT 5'
        );
        $nRec_traites = count($Rec_traites);

        return view('utilisateurs.admin-reclamations-recap', compact([
            'Rec_depots',
            'Rec_verifications',
            'Rec_traites',
        ]));
    }

    /*public function data()
    {
        $utilisateur = Auth::user();
        dd($utilisateur);

        $depots = DB::select('
            SELECT r.id, e.name, e.first_name, u.code, u.type_note
            FROM reclamations r, demandes d, etudiants e, etapes et, unite_enseignements u
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND d.etape_id = et.id
            AND et.libelle = "Dépôt"
            AND et.type = "reclamation"
            AND u.reclamation_id = r.id
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );

        $verifications = DB::select('
            SELECT r.id, e.name, e.first_name, u.code, u.type_note
            FROM reclamations r, demandes d, etudiants e, etapes et, unite_enseignements u
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND d.etape_id = et.id
            AND et.libelle = "Vérification"
            AND et.type = "reclamation"
            AND u.reclamation_id = r.id
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );

        $traites = DB::select('
        SELECT r.id, e.name, e.first_name, u.code, u.type_note
        FROM reclamations r, demandes d, etudiants e, etapes et, unite_enseignements u
        WHERE d.demandeable_id = r.id
        AND d.etudiant_id = e.id
        AND d.etape_id = et.id
        AND et.libelle = "Traité"
        AND et.type = "reclamation"
        AND u.reclamation_id = r.id
        AND e.etablissement_id = '.$utilisateur->etablissement->id
        );

        return view('utilisateurs.admin-depot-reclam', compact([
            'depots',
            'verifications',
            'traites',
        ]));

    }*/
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

        $this->validatorReclamation($request->all())->validate();
        #Creation de la reclamation
        $dr = Reclamation::create([]);

        #Creation de l'unite d'enseignement
        $dr->unite_enseignement()->create([
            'code' => $request->code,
            'libelle' => $request->libelle,
            'note_obtenue' => $request->note_obtenue,
            'note_reclame' => $request->note_reclame,
            'type_note' => $request->type_note,
        ]);

        #Creation de la demande
        $dr->demande()->create([
            'demandeable_id' => $dr->id,
            'date_depot' => date('Y-m-d H:i:s'),
            'etat' => 'En cours',
            'etudiant_id' => $etudiant->id,
            'etape_id' => 6,
        ]);

        ##Doit declencher le middleware de payement et apres retour vers ?? apres retouner sur l'acceuil avec un message lui disant que la demande a été enregistré
        ##Le retour doit se faire sur une page avec le layout avk un msg "Votre demande de reclamation a ete bien enregistre"
        ##On fait un return back pour l'instant after on decidera quoi faire
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
