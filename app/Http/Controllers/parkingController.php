<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class parkingController extends Controller
{
    function add(request $request){
        if (! $request->input('nom_parking')){
        return response()->json( 'ERREUR : champ parking vide!', 500 );
        }
        $parking = new Parking() ;
        if (!is_null($parking->where('nom_parking',
        $request->input('nom_parking'))->first()))
        return response()->json( 'ERREUR : nom_parking déjà existant!', 500 );
        $parking->nom_parking = $request->input('nom_parking');
        $parking->latitude = $request->input('latitude');
        $parking->longitude = $request->input('longitude');
        $parking->nombre_place_dispo = $request->input('nombre_place_dispo');
        $parking->nombre_total_place = $request->input('nombre_total_place');
        $parking->seuil_critique = $request->input('seuil_critique');
        $parking->seuil_alerte = $request->input('seuil_alerte');
        $parking->save() ;
        return (response()->json('enregistrement ok : '.json_encode($parking), 200 ));
        }

        function all() {
            return Parking::all();
        }
        
        function show($id){
            $parking = new Parking();
            $parking = $parking->find($id) ;
            if (is_null($parking))
            return (0);
            else
            return $parking ;
        }
    
        function delete($id){
            $parking = new Parking() ;
            $parking = $parking->find($id) ;
            if (is_null($parking))
            return (0);
            else
            {
            $parking->delete() ;
            return (1) ;
            }
        }
    }