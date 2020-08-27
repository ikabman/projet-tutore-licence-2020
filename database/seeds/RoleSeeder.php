<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///roles
        DB::table('roles')->insert([
            ['libelle' => 'Superadmin'],
            ['libelle' => 'Administrateur'],
        ]);

    }
}
