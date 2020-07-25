<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Payement;
use Illuminate\Support\Facades\DB;


class PayementTestApi extends Controller implements Payement
{
    public function getInformations(Request $request){
        $parametres = $request->all();
        $identifiantPayement = $parametres['identifiant_payement'];

        $donnees = DB::select('SELECT e.name AS Nom, e.first_name AS Prénom,
                                      e.numero_carte as \'Numero de carte\',
                                      et.libelle AS Etablissement,
                                      o.libelle AS Libelle,
                                      d.montant AS Montant,
                                      d.date_depot AS \'Date demande\' '
                             .'FROM etudiants e, etablissements et, options o, demandes d '
                             .'WHERE e.id = etudiant_id '
                             .'AND e.option_id = o.id '
                             .'AND e.etablissement_id =  et.id '
                             .'AND d.id = '.$identifiantPayement);

        return response()->json($donnees);
    }

    public function setPayementEffectue(Request $request){
        $parametres = $request->all();
        $identifiantPayement = $parametres['identifiant_payement'];

        DB::table('demandes')
            ->where('id', $identifiantPayement)
            ->update(['payement' => 1]);

        return response()->json(['Statut' => 'OK', 'Message' => 'Payement effectué avec succès!']);
    }

    public function setConfirmationPayement(Request $request){
        $parametres = $request->all();
        $identifiantPayement = $parametres['identifiant_payement'];

        DB::table('demandes')
            ->where('id', $identifiantPayement)
            ->update(['confirmation' => 1]);


        /*
        *A la confirmation du payement il faut vérifier que la demande concerne
        *une réclamation de notes si oui faire passer toutes les ues ou l'ue à l'étape dépôt
        *qui seront alors vus par l'admin de l'école
        *S'il s'agit plutôt d'une demande de releve alors faire passé la demande de releve
        *à l'étape dépôt
        NB: l'admin ne voit pas les étapes demandes, payement, il ne voit que les etapes
        à partir de dépôt
        */
        $typeReleve = "App\\\Releve";
        $typeReclamation = "App\\\Reclamation";
        $reclamation_id = DB::select('SELECT r.id'
                             .' FROM reclamations r, demandes d'
                             .' WHERE r.id = d.demandeable_id'                             
                             .' AND d.etat = \'En cours\''
                             .' AND d.confirmation = 1'
                             .' AND d.demandeable_type = \''.$typeReclamation.'\''
                             .' AND d.id = '.$identifiantPayement);


        if(isset($reclamation_id[0])){
             $reclamation_id = $reclamation_id[0]->id;
             DB::table('unite_enseignements')
                 ->where('reclamation_id', $reclamation_id)
                 ->update(['etape_id' => 10]);
        }

        $releve_id =  DB::select('SELECT d.demandeable_id'
                             .' FROM releves r, demandes d'
                             .' WHERE r.id = d.demandeable_id'
                             .' AND d.etat = \'En cours\''
                             .' AND d.confirmation = 1'
                             .' AND d.demandeable_type = \''.$typeReleve.'\''
                             .' AND d.id = '.$identifiantPayement);

         if(isset($releve_id[0])){
              $releve_id = $releve_id[0]->demandeable_id;
              DB::table('releves')
                  ->where('id', $releve_id)
                  ->update(['etape_id' => 3]);
         }

        return response()->json(['Status' => 'OK', 'Message' => 'Confirmation de payement effectuée avec succès!']);
    }
}
