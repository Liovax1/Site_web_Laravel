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
            ->where('type_noeud', 'LIKE', 'A%')
            ->pluck('dev_eui') // Pour récupérer uniquement la valeur de la colonne "nom_noeud" des résultats de la requete, sinon ca prend tout
            ->toArray(); // Pour mettre dans un tableau

            //$EuiAfficheur = array_diff($EuiAfficheur, [$devEui]);
            
            $typeNoeud = $noeudFind->type_noeud; // On récupère le type de noeud de l'url
            
            return response()->json(['ID' => $noeudFind->parking_id, 'Places dispos' => $parkingFind->nombre_place_dispo,'Type' => $typeNoeud, 'Afficheurs' => $EuiAfficheur], 200);
            }
            }
      }
