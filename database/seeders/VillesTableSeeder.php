<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VillesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('villes')->truncate();
        Schema::enableForeignKeyConstraints();
        
        DB::table('villes')->insert([
            [
                'nom'=>'Castillon-la-Bataille',
                'latitude'=>'44.849998',
                'longitude'=>'-0.03333',
                'code_postal'=>'33350'
            ],

            [
                'nom'=>'Bordeaux',
                'latitude'=>'44.833328',
                'longitude'=>'-0.56667',
                'code_postal'=>'33000'
            ]
            ]);
            
    }
}
