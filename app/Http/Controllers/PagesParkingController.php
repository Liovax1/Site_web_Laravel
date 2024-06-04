<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ville;
use App\Models\Parking;
use App\Models\NoeudLora;
use Schema;


class PagesParkingController extends Controller
{
    

    public function parking($id)
    {
        $parking = Parking::find($id);
        $parkings = DB::table('parkings')->select('nom_parking')->distinct()->get(); 
        $villes = Ville::all(); 
        return view('pages/parking')
            ->with('parking', $parking)
            ->with('parkings', $parkings)
            ->with('villes', $villes);
    }



    public function tousLesParkings()
    {
        $ville = new Ville();
        $villes = $ville->all();
        $tousLesParkings = [];
        foreach ($villes as $ville) {
            $parkings = $ville->parkings;
            array_push($tousLesParkings, ...$parkings);
        }
        return view('pages/tousLesParkings')
            ->with('parkings', $tousLesParkings)
            ->with('villes', $villes);
    }


    public function save(Request $request)
    {

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'id_')) {
                $id = substr($key, 3);

                
                $validatedData = $request->validate([
                    'ville_' . $id => 'required',
                ]);

                $parking = Parking::find($id);
                if ($parking) {
                    $parking->latitude = $request->input('latitude_' . $id);
                    $parking->longitude = $request->input('longitude_' . $id);
                    $parking->nombre_place_dispo = $request->input('nombre_place_dispo_' . $id);
                    $parking->nombre_place_total = $request->input('nombre_place_total_' . $id);
                    $parking->ville_id = $validatedData['ville_' . $id];
                    $parking->save();
                }
            }
        }
        return back();
    }


    public function saveParking(Request $request)
    {
        
        $validatedData = $request->validate([
            'nom_parking' => 'required|alpha|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'nombre_place_dispo' => 'required|numeric',
            'nombre_place_total' => 'required|numeric',

        ]);
        $parking = Parking::find($request->input('id'));
    
        if ($parking) {
            $parking->nom_parking = $request->input('nom_parking');
            $parking->latitude = $request->input('latitude');
            $parking->longitude = $request->input('longitude');
            $parking->nombre_place_dispo = $request->input('nombre_place_dispo');
            $parking->nombre_place_total = $request->input('nombre_place_total');
    
            $ville = Ville::where('nom', $request->input('ville'))->first();
    
            if ($ville) {
                $parking->ville()->associate($ville);
            }
    
            $parking->save();
        } else {
            return redirect()->back()->withErrors(['error' => 'Parking not found']);
        }
    
        return redirect()->route('parkingsVille', ['id' => $ville->id]);

    }


    public function createParking()
    {
        $villes = Ville::all();
        return view('pages/formAjouterParking',  ['villes' => $villes]);
    }

    public function ajoutParking(Request $request)
    {
        $validatedData = $request->validate([
            'nom_parking' => 'required|alpha|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'nombre_place_dispo' => 'required|numeric',
            'nombre_place_total' => 'required|numeric',

        ]);
        $parking = new Parking;
        $parking->nom_parking = $request->input('nom_parking');
        $parking->ville_id = $request->input('ville_id');
        $parking->latitude = $request->input('latitude');
        $parking->longitude = $request->input('longitude');
        $parking->nombre_place_dispo = $request->input('nombre_place_dispo');
        $parking->nombre_place_total = $request->input('nombre_place_total');
        $parking->save();
    
        return redirect()->route('tousLesParkings');
    }


    public function delete($id)
{
    $parking = Parking::findOrFail($id);
    $parking->delete();

    return redirect()->back();
}



public function parkingsVille($id)
{
    $ville = Ville::find($id);
    $parkings = Parking::where('ville_id', $id)->get();
    return view('pages/parkingsVille', ['parkings' => $parkings, 'ville' => $ville]);
}




}
