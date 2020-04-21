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

class DepotReclamationsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:utilisateur');
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
            SELECT e.name, e.first_name, u.code, u.type_note, u.id, u.etape_id
            FROM reclamations r, demandes d, etudiants e, etapes et, unite_enseignements u
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND u.etape_id = 8
            AND d.montant >= 2000
            AND u.reclamation_id = r.id
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );
        $nRec_depots = count($Rec_depots);

        return view('utilisateurs.admin-depot-reclam', compact([
            'Rec_depots',
            'nRec_depots',
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
