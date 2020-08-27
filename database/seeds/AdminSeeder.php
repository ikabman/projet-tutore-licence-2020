<?php

use Illuminate\Database\Seeder;
use App\Utilisateur;
use App\Etablissement;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $etablissements = DB::table('etablissements')->get()->all();

        foreach($etablissements as $ets){

            $mail = $ets->libelle_court.'_admin@email.tg';
            $mdp = $ets->libelle_court.'_admin';
            $first_name = $ets->libelle_court;
            $ets_id = $ets->id;            

            DB::table('utilisateurs')->insert([
                [
                    'name' => 'admin',
                    'first_name' => $first_name,
                    'email' => $mail,
                    'login' => 'admin',
                    'phone' => '00000000',
                    'password' => Hash::make($mdp),
                    'etablissement_id' => $ets_id,
                    'role_id' => '1',
                ]
            ]);
        }
    }
}
