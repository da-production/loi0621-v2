<?php

use Database\Seeders\OptionSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(WilayaSeeder::class);
        // $this->call(StatutJuridiqueSeeder::class);
        // $this->call(BrancheSeeder::class);
        // $this->call(AdministrateurSeeder::class);
        $this->call(OptionSeeder::class);
    }
}
