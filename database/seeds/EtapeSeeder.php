<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Etape;

class EtapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //etapes
        DB::table('etapes')->insert([
            ['libelle' => 'Demande','type' => 'releve'],
            ['libelle' => 'Payement','type' => 'releve'],
            ['libelle' => 'Dépôt','type' => 'releve'],
            ['libelle' => 'Imprimé','type' => 'releve'],
            ['libelle' => 'Vérification','type' => 'releve'],
            ['libelle' => 'Signature','type' => 'releve'],
            ['libelle' => 'Traité','type' => 'releve'],
            ['libelle' => 'Demande', 'type' => 'reclamation'],
            ['libelle' => 'Payement', 'type' => 'reclamation'],
            ['libelle' => 'Dépôt', 'type' => 'reclamation'],
            ['libelle' => 'Vérification', 'type' => 'reclamation'],
            ['libelle' => 'Traité', 'type' => 'reclamation'],
            ['libelle' => 'Historique', 'type' => 'general'],
        ]);
    }
}
