<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EtapeReleveController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth:utilisateur');
    }

    /*
    *Cette fonction a pour but de contenir la requête de selection des releves
    *afin d'éviter les redondances d'une part -le seul paramètre variant étant etape_id- et
    *d'autre part de faciliter la modification de la requête et/ou sa mise à jour.
    */
    public function releves($etapeId){
        $utilisateur = Auth::user();
        $demandes = DB::select('
            SELECT DISTINCT r.id, e.name, e.first_name, r.annee_du_releve, r.type_releve, r.etape_id
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND r.etape_id = '.$etapeId.'
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );
        return $demandes;
    }

    /*
    *Cette fonction renvoie les relevés à l'étape dépôt
    */
    public function depots(){
        $Rel_depots = $this->releves(3);
        $nRel_depots = COUNT($Rel_depots);
        return view('utilisateurs.admin-depot-rel', compact([
            'Rel_depots',
            'nRel_depots',
        ]));
    }

    /*
    *Cette fonction renvoie les relevés à l'étape impresion
    */
    public function impressions(){
        $Rel_imprimes = $this->releves(4);
        $nRel_imprimes = COUNT($Rel_imprimes);
        return view('utilisateurs.admin-impression-rel', compact([
            'Rel_imprimes',
            'nRel_imprimes',
        ]));
    }

    /*
    *Cette fonction renvoie les relevés à l'étape verification
    */
    public function verifications(){
        $Rel_verifications = $this->releves(5);
        $nRel_verifications = COUNT($Rel_verifications);
        return view('utilisateurs.admin-verification-rel', compact([
            'Rel_verifications',
            'nRel_verifications',
        ]));
    }

    /*
    *Cette fonction renvoie les relevés à l'étape signature
    */
    public function signatures(){
        $Rel_signatures = $this->releves(6);
        $nRel_signatures = COUNT($Rel_signatures);
        return view('utilisateurs.admin-signature-rel', compact([
            'Rel_signatures',
            'nRel_signatures',
        ]));
    }

    /*
    *Cette fonction renvoie les relevés à l'étape fin traitement
    */
    public function traites(){
        $Rel_traites = $this->releves(7);
        $nRel_traites = COUNT($Rel_traites);
        return view('utilisateurs.admin-finTraitement-rel', compact([
            'Rel_traites',
            'nRel_traites',
        ]));
    }
}
