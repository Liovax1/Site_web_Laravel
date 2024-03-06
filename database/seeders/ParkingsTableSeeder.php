<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ParkingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('parkings')->truncate();
        Schema::enableForeignKeyConstraints();
        

        $seuil_critique = $this->couleur('orange');
        $seuil_alerte = $this->couleur('rouge');

    
        DB::table('parkings')->insert([
            [
                'nom_parking'=>'Allées de la République',
                'latitude'=>'44.852646 ',
                'longitude'=>'-0.043511',
                'ville_id'=>1,
                'nombre_place_dispo'=>'0',
                'nombre_place_total'=>'200',
                'seuil_critique'=>$seuil_critique,
                'seuil_alerte'=>$seuil_alerte

            ],

            [
                'nom_parking'=>'Place Maréchal de Turenne',
                'latitude'=>'44.852592',
                'longitude'=>'-0.042573',
                'ville_id'=>1,
                'nombre_place_dispo'=>'0',
                'nombre_place_total'=>'180',
                'seuil_critique'=>$seuil_critique,
                'seuil_alerte'=>$seuil_alerte
            ],

            [
                'nom_parking'=>'Tourny',
                'latitude'=>'44.843788',
                'longitude'=>'-0.576081',
                'ville_id'=>2,
                'nombre_place_dispo'=>'0',
                'nombre_place_total'=>'200',
                'seuil_critique'=>$seuil_critique,
                'seuil_alerte'=>$seuil_alerte
            ],

            [
                'nom_parking'=>'Pey Berland',
                'latitude'=>'44.837265',
                'longitude'=>'-0.577137',
                'ville_id'=>2,
                'nombre_place_dispo'=>'0',
                'nombre_place_total'=>'220',
                'seuil_critique'=>$seuil_critique,
                'seuil_alerte'=>$seuil_alerte
            ]
            ]);
    }

    private function couleur($nom) {
        $couleurs = [
            'rouge' => '#FF0000',
            'orange' => '#FFA500',
            // Ajoutez ici d'autres couleurs si nécessaire
        ];

        return $couleurs[$nom] ?? null;
    }
}

