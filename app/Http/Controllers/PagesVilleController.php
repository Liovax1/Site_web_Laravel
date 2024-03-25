<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Parking;
use Schema;

class PagesVilleController extends Controller
{
    public function villes(){

        $ville = new Ville();
        $villes = $ville->all();
        $nomsChamps = Schema::getColumnListing($ville->getTable());
        return view ('pages/villes')
        ->with('villes',$villes)
        ->with('nomsChamps',$nomsChamps);
    }
        
    
    public function ville($id){
        $ville = new Ville();
        $villeFind = $ville->find($id);
        $nomsChamps = Schema::getColumnListing($ville->getTable());
        return view ('pages/ville')
        ->with('villeFind',$villeFind)
        ->with('nomsChamps',$nomsChamps);
    }


    public function parkings($id){
        $ville = Ville::find($id);
        $parkings = $ville->parkings;
        return view('pages/parkings')
            ->with('parkings', $parkings)
            ->with('ville', $ville);

    }

    public function tousLesParkings(){
        $ville = new Ville();
        $villes = $ville->all();
        $tousLesParkings = [];
        foreach($villes as $ville) {
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
            
            // Valider les données du formulaire pour chaque parking
            $validatedData = $request->validate([
                'ville_'.$id => 'required',
            ]);

            $parking = Parking::find($id);
            if ($parking) {
                // Mettre à jour les attributs du parking
                $parking->latitude = $request->input('latitude_'.$id);
                $parking->longitude = $request->input('longitude_'.$id);
                $parking->nombre_place_dispo = $request->input('nombre_place_dispo_'.$id);
                $parking->nombre_place_total = $request->input('nombre_place_total_'.$id);
                $parking->ville_id = $validatedData['ville_'.$id]; 
                // Enregistrer les modifications
                $parking->save();
            }
        }
    }
    return back();
}

    public function saveVille(Request $request)
{
    // Trouver la ville par son ID
    $ville = Ville::find($request->input('id'));

    if ($ville) {
        $ville->nom = $request->input('nom');
        $ville->latitude = $request->input('latitude');
        $ville->longitude = $request->input('longitude');
        $ville->code_postal = $request->input('code_postal');
        $ville->save();
    } else {
        return redirect()->back()->withErrors(['error' => 'Ville not found']);
    }

    return back();
}
}

