<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministrateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'cod_wilaya'        => '16',
                'nom'               => 'Mebrouki',
                'prenom'            => 'Amine',
                'username'          => 'Mebrouki',
                'fonction'          => 'Technicien en informatique',
                'status'            => 1,
                'email'             => 'administrateur@cnac.local',
                'role_id'           => 1,
                'password'          => bcrypt('Cn@c*2021'),
            ],
            [
                'cod_wilaya'        => '16',
                'nom'               => 'Oulaceb',
                'prenom'            => 'Sabrina',
                'username'          => 'Oulaceb',
                'fonction'          => 'Ingenieur en informatique',
                'status'            => 1,
                'email'             => 'sab.administrateur@cnac.local',
                'role_id'           => 1,
                'password'          => bcrypt('Cn@c*2021'),
            ],     
            
        ];
        DB::table('administrateurs')->insert($users);
    }
}
