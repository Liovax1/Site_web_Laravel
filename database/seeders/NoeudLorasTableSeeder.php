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
            'dev_eui' => '1234',
            'parking_id'=>1
        ],

        [   
            'nom_noeud' => 'D2',
            'type_noeud' => 'Output',
            'dev_eui' => '4321',
            'parking_id'=>1
        ],

        [   
            'nom_noeud' => 'A1',
            'type_noeud' => 'Afficheur',
            'dev_eui' => '0000',
            'parking_id'=>1
        ],

        [   
            'nom_noeud' => 'D3',
            'type_noeud' => 'Input',
            'dev_eui' => '7890',
            'parking_id'=>2
        ],

        [   
            'nom_noeud' => 'D4',
            'type_noeud' => 'Output',
            'dev_eui' => '1111',
            'parking_id'=>2
        ],

        [   
            'nom_noeud' => 'A2',
            'type_noeud' => 'Afficheur',
            'dev_eui' => '2222',
            'parking_id'=>2
        ],

        ]);
        
    }
}
