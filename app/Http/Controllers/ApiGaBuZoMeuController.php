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
        $noeudFind = NoeudLora::where('dev_eui', $idNoeud)->first();
        if ($noeudFind == null){
            return response()->json(['Erreur' => 'None'], 422);
        }
        else {
            $parkingFind = Parking::find($noeudFind->parking_id);
            $infos = [];
            $EuiAfficheur = NoeudLora::where('parking_id', $noeudFind->parking_id)
            ->where('dev_eui', 'LIKE', '%')
            ->pluck('dev_eui') // Pour récupérer uniquement la valeur de la colonne "nom_noeud" des résultats de la requete, sinon ca prend tout
            //->first(); // Pour récupérer le premier résultat de la requete
            ->toArray();
        
            array_shift($EuiAfficheur);
            $typeNoeud = NoeudLora::where('parking_id', $noeudFind->parking_id)
             ->where('type_noeud', 'LIKE', '%')
             ->pluck('type_noeud')
             ->first();
             //->toArray();
            
            return response()->json(['ID' => $noeudFind->parking_id, 'Place dispo' => $parkingFind->nombre_place_dispo,'Type' => $typeNoeud, 'Afficheur' => $EuiAfficheur], 200);
        }
        }   
      }
