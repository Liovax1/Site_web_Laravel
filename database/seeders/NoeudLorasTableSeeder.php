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
            'appEUI' => '123456',
	        'appKey' => '123456',
            'parking_id'=>1
        ],

        [   
            'nom_noeud' => 'D2',
            'type_noeud' => 'Output',
            'appEUI' => '135790',
	        'appKey' => '135790',
            'parking_id'=>1
        ],

        [   
            'nom_noeud' => 'A1',
            'type_noeud' => 'Afficheur',
            'appEUI' => '000000',
	        'appKey' => '000000',
            'parking_id'=>1
        ],

        [   
            'nom_noeud' => 'D3',
            'type_noeud' => 'Input',
            'appEUI' => '123456',
	        'appKey' => '123456',
            'parking_id'=>2
        ],

        [   
            'nom_noeud' => 'D4',
            'type_noeud' => 'Output',
            'appEUI' => '123456',
	        'appKey' => '123456',
            'parking_id'=>2
        ],

        [   
            'nom_noeud' => 'A2',
            'type_noeud' => 'Afficheur',
            'appEUI' => '123456',
	        'appKey' => '123456',
            'parking_id'=>2
        ],

        ]);
        
    }
}
