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
       // dd($relevesBalise);
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
        // Trouver le parking par son ID
        $parking = Parking::find($request->input('id'));
    
        if ($parking) {
            // Mettre à jour les attributs du parking
            $parking->nom_parking = $request->input('nom_parking');
            $parking->latitude = $request->input('latitude');
            $parking->longitude = $request->input('longitude');
            $parking->nombre_place_dispo = $request->input('nombre_place_dispo');
            $parking->nombre_place_total = $request->input('nombre_place_total');
            $parking->ville_id = $request->input('ville'); // Assurez-vous que 'ville' est le nom du champ de sélection dans votre formulaire
    
            // Enregistrer les modifications
            $parking->save();
        } else {
            // Gérer le cas où le parking n'est pas trouvé
            // Par exemple, vous pouvez rediriger l'utilisateur vers une page d'erreur
            return redirect()->back()->withErrors(['error' => 'Parking not found']);
        }
    
        // Rediriger l'utilisateur vers une page de confirmation
        return back();
    }

}

