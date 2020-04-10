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

class EtapeReclamationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:etudiant')->only('create', 'store');

        $this->middleware('auth:utilisateur')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateur = Auth::user();

        $Rec_depots = DB::select('
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

        $Rec_verifications = DB::select('
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

        $Rec_traites = DB::select('
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
