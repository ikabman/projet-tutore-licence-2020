<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Option;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ajout des options
        DB::table('options')->insert([
            ['libelle' => 'Interprétariat-Traduction Français-Chinois-Français'],
            ['libelle' => 'Allemand'],
            ['libelle' => 'Anglais'],
            ['libelle' => 'Linguistique Générale'],
            ['libelle' => 'Littérature Africaine et du Monde'],
            ['libelle' => 'Littérature et Civilisation Hispanique'],
            ['libelle' => 'Analyse et Contrôle des Aliments'],
            ['libelle' => 'Phytotechnie Générale'],
            ['libelle' => 'Socio-économie rurale'],
            ['libelle' => 'Zootechnie'],
            ['libelle' => 'Anglais'],
            ['libelle' => 'Français'],
            ['libelle' => 'Histoire et Géographie'],
            ['libelle' => 'Physique - Chimie'],
            ['libelle' => 'Sciences de la Vie et de la Terre'],
            ['libelle' => 'Science de l’Education et de la Formation'],
            ['libelle' => 'Communication des Organisations'],
            ['libelle' => 'Journalisme'],
            ['libelle' => 'Publicité et Arts Graphiques'],
            ['libelle' => 'Anthropologie'],
            ['libelle' => 'Géographie'],
            ['libelle' => 'Histoire'],
            ['libelle' => 'Philosophie générale'],
            ['libelle' => 'Psychologie de l’Éducation'],
            ['libelle' => 'Psychologie de la Santé'],
            ['libelle' => 'Psychologie du Travail'],
            ['libelle' => 'Sociologie'],
            ['libelle' => 'Analyses médicales et biologiques'],
            ['libelle' => 'Médecine'],
            ['libelle' => 'Odonto-stomatologie'],
            ['libelle' => 'Officine'],
            ['libelle' => 'Comptabilité et Fiscalité - FC'],
            ['libelle' => 'Finance et Comptabilité'],
            ['libelle' => 'Gestion Commerciale'],
            ['libelle' => 'Analyse et Politique Économique'],
            ['libelle' => 'Comptabilité, Contrôle Audit'],
            ['libelle' => 'Économie du Développement'],
            ['libelle' => 'Économie Internationale'],
            ['libelle' => 'Marketing et Stratégie'],
            ['libelle' => 'Organisation et Gestion des Ressources Humaines'],
            ['libelle' => 'Cadre Technique des Travaux de Génie Civil'],
            ['libelle' => 'Cadre Technique des Travaux de Génie Électrique'],
            ['libelle' => 'Cadre Technique des Travaux de Génie Mécanique'],
            ['libelle' => 'Chimie Analytique, Mines et Environnement'],
            ['libelle' => 'Conducteur des Travaux en Génie Civil'],
            ['libelle' => 'Conducteur des Travaux en Génie Électrique'],
            ['libelle' => 'Conducteur des Travaux en Génie Mécanique'],
            ['libelle' => 'Génie Civil'],
            ['libelle' => 'Génie Logiciel'],
            ['libelle' => 'Géologie Minière'],
            ['libelle' => 'Gestion de l’Eau et de l’Environnement'],
            ['libelle' => 'Maintenance et Réseaux Informatiques'],
            ['libelle' => 'Maintenance Industrielle'],
            ['libelle' => 'Production et Gestion durable de l’énergie électrique'],
            ['libelle' => 'Biologie et physiologie animale'],
            ['libelle' => 'Biologie et physiologie végétale'],
            ['libelle' => 'Chimie'],
            ['libelle' => 'Génie Électrique'],
            ['libelle' => 'Génie Mécanique'],
            ['libelle' => 'Géologie'],
            ['libelle' => 'Mathématiques'],
            ['libelle' => 'Physique'],
            ['libelle' => 'Assistant Administratif - Entreprises et Administration'],
            ['libelle' => 'Assistant Administratif - Entreprises et Administration (soir)'],
            ['libelle' => 'Assistant Administratif - Juridique'],
            ['libelle' => 'Assistant Administratif - Juridique (soir)'],
            ['libelle' => 'Droit Privé'],
            ['libelle' => 'Droit public'],
        ]);
    }
}
