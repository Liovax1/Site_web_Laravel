<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Models\NoeudLora;
use Illuminate\Http\Request;

class ApiGaBuZoMeuController extends Controller
{
    function setPlaceDispo($idParking, $nombrePlaceDispo){
        $parking = new Parking();
        $parkingFind = $parking->find($idParking);

        if ($parkingFind == null) 
            return response()->json(['None' => $idParking], 422);
        else {
            $parkingFind->nombre_place_dispo = $nombrePlaceDispo;
            //dd($parkingFind);
            $parkingFind->save();
            return response()->json(['Place dispo' => $nombrePlaceDispo], 200);
        }
    }


        function getInfoNoeud($devEui){
            $noeudFind = NoeudLora::where('dev_eui', $devEui)->first();
            if ($noeudFind == null){
            return response()->json(['Erreur' => 'None'], 422);
            }
            else {
            $parkingFind = Parking::find($noeudFind->parking_id);
            $infos = [];
            $EuiAfficheur = NoeudLora::where('parking_id', $noeudFind->parking_id)
            ->where('dev_eui', 'LIKE', '%')
            ->pluck('dev_eui')
            ->toArray();
            
            array_shift($EuiAfficheur);
            
            $typeNoeud = $noeudFind->type_noeud; // On récupère le type de noeud
            
            return response()->json(['ID' => $noeudFind->parking_id, 'Place dispo' => $parkingFind->nombre_place_dispo,'Type' => $typeNoeud, 'Afficheur' => $EuiAfficheur], 200);
            }
            }
      }
