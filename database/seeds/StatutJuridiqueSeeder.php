<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutJuridiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //
         $statut_juridiques = [
            ['cod_stat'=>'001','des_fr'=>'SARL'],
            ['cod_stat'=>'002','des_fr'=>'EPE'],	
            ['cod_stat'=>'003','des_fr'=>'EPL'],	
            ['cod_stat'=>'004','des_fr'=>'EURL'],
            ['cod_stat'=>'005','des_fr'=>'SPA	'],
            ['cod_stat'=>'006','des_fr'=>'EPIC'],
            ['cod_stat'=>'007','des_fr'=>'SNC	'],
            ['cod_stat'=>'008','des_fr'=>'PRIVE NATIONAL'],
            ['cod_stat'=>'009','des_fr'=>'PRIVE ETRANGER'],
            ['cod_stat'=>'010','des_fr'=>'Personne physique'],
            ['cod_stat'=>'012','des_fr'=>'Entreprise Individuelle'],	
            ['cod_stat'=>'013','des_fr'=>'AUTRE'],
        ];
        DB::table('statut_juridiques')->insert($statut_juridiques);
    }
}
