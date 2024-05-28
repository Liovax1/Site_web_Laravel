<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NoeudLorasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('noeud_loras')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('noeud_loras')->insert([
        [   
            'nom_noeud' => 'D1',
            'type_noeud' => 'Input',
            'dev_eui' => '798902924a13e2fb',
            'parking_id'=>1
        ],

        [   
            'nom_noeud' => 'D2',
            'type_noeud' => 'Output',
            'dev_eui' => '68915d8871ccfc25',
            'parking_id'=>1
        ],

        [   
            'nom_noeud' => 'A1',
            'type_noeud' => 'Afficheur',
            'dev_eui' => 'ba59289a0953330e',
            'parking_id'=>1
        ],

        [   
            'nom_noeud' => 'D3',
            'type_noeud' => 'Input',
            'dev_eui' => 'c1ce7f659cd1285b',
            'parking_id'=>2
        ],

        [   
            'nom_noeud' => 'D4',
            'type_noeud' => 'Output',
            'dev_eui' => '46b54db015d6b787',
            'parking_id'=>2
        ],

        [   
            'nom_noeud' => 'A2',
            'type_noeud' => 'Afficheur',
            'dev_eui' => 'ed33b2b980ea5233',
            'parking_id'=>2
        ],

        ]);
        
    }
}
