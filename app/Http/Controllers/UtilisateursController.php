<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Etudiant;
use App\Releve;
use App\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UtilisateursController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:utilisateur');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateur = Auth::user();

        #Selectionner le nbre d étudiants inscrits dans un etablissement donné
        $etudiants = DB::select('
        SELECT *
        FROM etudiants e
        WHERE e.etablissement_id ='.$utilisateur->etablissement_id
        );
        #COUNT
        $nEtudiants = COUNT($etudiants);

        #Le nbre de demandes de reclamation pour un etablissement donné
        $reclamations = DB::select('
            SELECT *
            FROM reclamations r, demandes d, etudiants e
            WHERE r.id = d.demandeable_id
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement_id
        );
        #COUNT
        $nReclamations = COUNT($reclamations);

        #Le nbre de demandes de releve pour un etablissement donné
        $releves = DB::select('
            SELECT *
            FROM releves r, demandes d, etudiants e
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement_id
        );
        #COUNT
        $nReleves = COUNT($releves);

        #Le nbre de dmd de rel definitifs pr en ets donné
        $rel_def = DB::select('
            SELECT *
            FROM releves r, demandes d, etudiants e
            WHERE r.type_releve = "definitif"
            AND r.id = d.demandeable_id
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement_id
        );
        #COUNT
        $nRel_def = COUNT($rel_def);

        #Le nbre de dmd de rel intermediaire pr en ets donné
        $rel_inter = DB::select('
            SELECT *
            FROM releves r, demandes d, etudiants e
            WHERE r.type_releve = "intermediaire"
            AND r.id = d.demandeable_id
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement_id
        );
        #COUNT
        $nRel_inter = COUNT($rel_inter);

        #Selectionner les demandes pr un ets donné
        $demandes = DB::select('
            SELECT d.id, d.date_depot, d.etat, e.name, e.first_name
            FROM demandes d, etudiants e
            WHERE d.etudiant_id = e.id
            AND e.etablissement_id ='.$utilisateur->etablissement_id.'
            LIMIT 3'
        );

        ##Pourcentage ops
        $Rel_depot = DB::select('
            SELECT *
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND r.etape_id = et.id
            AND d.etudiant_id = e.id
            AND et.libelle = "Dépôt"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );
        $nRel_depot = COUNT($Rel_depot);
        if($nReleves > 0)
        {
            $p_depot = 100 * ($nRel_depot/$nReleves);
        }
        else
        {
            $p_depot = 0;
        }

        $Rel_imprime = DB::select('
            SELECT *
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND r.etape_id = et.id
            AND d.etudiant_id = e.id
            AND et.libelle = "Imprimé"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );
        $nRel_imprime = COUNT($Rel_imprime);
        if($nReleves > 0)
        {
            $p_imprime = 100 * ($nRel_imprime/$nReleves);
        }
        else
        {
            $p_imprime = 0;
        }

        $Rel_verification = DB::select('
            SELECT *
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND r.etape_id = et.id
            AND d.etudiant_id = e.id
            AND et.libelle = "Vérification"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );
        $nRel_verification = COUNT($Rel_verification);
        if($nReleves > 0)
        {
            $p_verification = 100 * ($nRel_verification/$nReleves);
        }
        else
        {
            $p_verification = 0;
        }

        $Rel_signature = DB::select('
            SELECT *
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND r.etape_id = et.id
            AND d.etudiant_id = e.id
            AND et.libelle = "Signature"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );
        $nRel_signature = COUNT($Rel_signature);
        if($nReleves > 0)
        {
            $p_signature = 100 * ($nRel_signature/$nReleves);
        }
        else
        {
            $p_signature = 0;
        }

        $Rel_traite = DB::select('
            SELECT *
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND r.etape_id = et.id
            AND d.etudiant_id = e.id
            AND et.libelle = "Traité"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );
        $nRel_traite = COUNT($Rel_traite);
        if($nReleves > 0)
        {
            $p_traite = 100 * ($nRel_traite/$nReleves);
        }
        else
        {
            $p_traite = 0;
        }

        return view('utilisateurs.index', compact([
            'nEtudiants',
            'nRel_inter',
            'nRel_def',
            'nReleves',
            'nReclamations',
            'demandes',
            'p_traite',
            'p_signature',
            'p_verification',
            'p_imprime',
            'p_depot',
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
