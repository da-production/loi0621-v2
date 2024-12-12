<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrancheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $branches = [
            ['cod_branche'=>'0001','des_fr'=>'BTP'],	
            ['cod_branche'=>'0002'	,'des_fr'=>'Hydraulique'],
            ['cod_branche'=>'0003','des_fr'=>'Service'],
            ['cod_branche'=>'0004','des_fr'=>'Industrie'],
            ['cod_branche'=>'0005'	,'des_fr'=>'Agriculture'],
            ['cod_branche'=>'0006'	,'des_fr'=>'Artisanat'],
            ['cod_branche'=>'0007'	,'des_fr'=>'Industrie'],
            ['cod_branche'=>'0008','des_fr'=>'Maintenance'],	
            ['cod_branche'=>'0009','des_fr'=>'Peche'],
            ['cod_branche'=>'0010','des_fr'=>'Profession libérale'],
            ['cod_branche'=>'0011','des_fr'=>'Transport de marchandises'],	
            ['cod_branche'=>'0012','des_fr'=>'Transport de voyageurs'],
            ['cod_branche'=>'0013','des_fr'=>'Electricité'],
            ['cod_branche'=>'0014','des_fr'=>'Gaz'],
            ['cod_branche'=>'0015','des_fr'=>'Autres'],
        ];
        DB::table('branches')->insert($branches);
    }
}
