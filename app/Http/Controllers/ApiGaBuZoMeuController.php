<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Models\NoeudLora;
use Illuminate\Http\Request;

class ApiGaBuZoMeuController extends Controller
{
    

    function setPlaceDispo($idParking, $nombrePlaceDispo){
        $parking = Parking::find($idParking);
        
        if ($parking == null)
            return response()->json(['None' => $idParking], 422);
        else {
            if ($nombrePlaceDispo < 0) {
                return response()->json(['Erreur' => 'Valeur négative'], 422);
            }
        
        $nombreTotalPlacesParking = $parking->nombre_place_total;
        
        if ($nombrePlaceDispo > $nombreTotalPlacesParking) {
            return response()->json(['Erreur' => 'Valeur Dépassée'], 422);
        }
        
        $parking->nombre_place_dispo = $nombrePlaceDispo;
        //dd($parkingFind);
        $parking->save();
        return response()->json(['Place dispo' => $nombrePlaceDispo], 200);
        }
        }


    function getInfoNoeud($devEui){
        $noeudFind = NoeudLora::where('dev_eui', $devEui)->first(); // On cherche un noeud lora dans la table "noeud_loras" où la colonne "dev_eui" correspond à la valeur du devEUI du noeud
        if ($noeudFind == null){
            return response()->json(['Erreur' => 'None'], 422);
            }
        else {
            $parkingFind = Parking::find($noeudFind->parking_id);
            $EuiAfficheur = NoeudLora::where('parking_id', $noeudFind->parking_id)
                ->where('type_noeud', 'LIKE', 'A%')
                ->pluck('dev_eui') // Pour récupérer uniquement les valeurs de la colonne "dev_eui", sinon ca prend tout
                ->toArray(); // Pour mettre dans un tableau
            
            $typeNoeud = $noeudFind->type_noeud; // On récupère le type de noeud de l'url
            
            return response()->json(['ID' => $noeudFind->parking_id, 'Places dispos' => $parkingFind->nombre_place_dispo,'Type' => $typeNoeud, 'Afficheurs' => $EuiAfficheur], 200);
            }
            } 


    function getInfoParking(){
        $parkings = Parking::all();
                    
        $parkingInfo = [];

        foreach ($parkings as $parking) {
            $parkingInfo[] = ['ID' => $parking->id, 'Places dispos' => $parking->nombre_place_dispo, 'Places totales' => $parking->nombre_place_total];
            }
                    
            return response()->json($parkingInfo, 200);
            }
}
