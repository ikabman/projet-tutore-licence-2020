<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EtapeReclamationController extends Controller
{
    public function __construct() {
        $this->middleware('auth:utilisateur')->only('depots', 'verifications', 'traites');
    }

    /*
    *Cette fonction a pour but de contenir la requête de selection des reclamations
    *afin d'éviter les redondances d'une part -le seul paramètre variant étant etape_id- et
    *d'autre part de faciliter la modification de la requête et/ou sa mise à jour.
    */
    public function reclamations($etapeId){
        $utilisateur = Auth::user();
        $demandes = DB::select('
            SELECT DISTINCT e.name, e.first_name, u.code, u.type_note, u.id, u.etape_id
            FROM reclamations r, demandes d, etudiants e, etapes et, unite_enseignements u
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND u.etape_id = '.$etapeId.'
            AND u.reclamation_id = r.id
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );
        return $demandes;
    }

    /*
    *Cette fonction renvoie les reclamations à l'étape dépôt
    */
    public function depots(){
        $Rec_depots = $this->reclamations(10);
        $nRec_depots = count($Rec_depots);
        $etape = "depots"; #Uitle uniquement pour l'affichage visuel
        $active = "reclamations";
        return view('utilisateurs.admin-depot-reclam', compact([
            'Rec_depots',
            'nRec_depots',
            'etape',
            'active'
        ]));
    }

    /*
    *Cette fonction renvoie les reclamations à l'étape vérification
    */
    public function verifications(){
        $Rec_verifications = $this->reclamations(11);
        $nRec_verifications = count($Rec_verifications);
        $etape = "verifications"; #Uitle uniquement pour l'affichage visuel
        $active = "reclamations";
        return view('utilisateurs.admin-verification-reclam', compact([
            'Rec_verifications',
            'nRec_verifications',
            'etape',
            'active'
        ]));
    }

    /*
    *Cette fonction renvoie les reclamations à l'étape fin traitment
    */
    public function traites(){
        $Rec_traites = $this->reclamations(12);
        $nRec_traites = count($Rec_traites);
        $etape = "traites"; #Uitle uniquement pour l'affichage visuel
        $active = "reclamations";
        return view('utilisateurs.admin-finTraitement-reclam', compact([
            'Rec_traites',
            'nRec_traites',
            'etape',
            'active'
        ]));
    }
}
