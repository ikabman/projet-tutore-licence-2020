<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Etablissement;

class EtablissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Ajout des etablissements dans la base
        DB::table('etablissements')->insert([
            ['libelle' => 'Faculté des sciences', 'libelle_court' => 'FDS'],
            ['libelle' => 'Faculté des sciences de la santé', 'libelle_court' => 'FSS'],
            ['libelle' => 'Faculté des sciences économiques et de gestion', 'libelle_court' => 'FASEG'],
            ['libelle' => 'Faculté de droit', 'libelle_court' => 'FDD'],
            ['libelle' => 'Faculté des sciences de l\'homme et de la société', 'libelle_court' => 'FSHS'],
            ['libelle' => 'Faculté des Lettres, Langues et Arts', 'libelle_court' => 'FLLA'],
            ['libelle' => 'École Nationale Supérieure d\'Ingénieurs', 'libelle_court' => 'ENSI'],
            ['libelle' => 'École des Assistants Médicaux', 'libelle_court' => 'EAM'],
            ['libelle' => 'École Supérieure d\'Agronomie', 'libelle_court' => 'ESA'],
            ['libelle' => 'École Supérieure des Assistants Administratifs', 'libelle_court' => 'ESAAd'],
            ['libelle' => 'École Supérieure des Techniques Biologiques et Alimentaires', 'libelle_court' => 'ESTBA'],
            ['libelle' => 'Institut National des Sciences de l\’Éducation', 'libelle_court' => 'INSE'],
            ['libelle' => 'Institut Universitaire de Technologie de Gestion', 'libelle_court' => 'IUT de Gestion'],
            ['libelle' => 'Institut des Sciences de l’Information, de la Communication et des Arts', 'libelle_court' => 'ISICA'],
            ['libelle' => 'Institut National de la Jeunesse et des Sport', 'libelle_court' => 'INJS'],
            ['libelle' => 'Institut Conficius', 'libelle_court' => 'NULL'],
            ['libelle' => 'Centre Informatique et de Calcul', 'libelle_court' => 'CIC'],
            ['libelle' => 'Centre de Formation Continu', 'libelle_court' => 'CFC'],
        ]);
    }
}