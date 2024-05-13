<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->call(UtilisateursTableSeeder::class);
        $this->call(VillesTableSeeder::class);
        $this->call(ParkingsTableSeeder::class);
        $this->call(NoeudLorasTableSeeder::class);
    }
}
