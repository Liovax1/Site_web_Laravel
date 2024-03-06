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



function getInfoNoeud($idNoeud){
    $noeudFind = NoeudLora::where('dev_eui', $idNoeud)->first();;
    if ($noeudFind == null){
    return response()->json(['Erreur' => 'None'], 422);
    }
    else {
    $parkingFind = Parking::find($noeudFind->parking_id);
    return response()->json(['ID' => $noeudFind->parking_id,  'Place dispo' => $parkingFind->nombre_place_dispo, 'Type' => $noeudFind->type_noeud], 200);
    }
    }
}