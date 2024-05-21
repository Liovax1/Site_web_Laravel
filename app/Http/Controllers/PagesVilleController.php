<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ville;
use App\Models\Parking;
use Illuminate\Support\Facades\Auth;
use Schema;

class PagesVilleController extends Controller
{
    public function villes()
    {

        $ville = new Ville();
        $villes = $ville->all();
        $nomsChamps = Schema::getColumnListing($ville->getTable());

        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            return redirect()->route('accueil');
        }
        
        return view('pages/villes')
            ->with('villes', $villes)
            ->with('nomsChamps', $nomsChamps);
    }


    public function ville($id)
    {
        $ville = new Ville();
        $villeFind = $ville->find($id);
        $nomsChamps = Schema::getColumnListing($ville->getTable());

        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            return redirect()->route('accueil');
        }
        
        return view('pages/ville')
            ->with('villeFind', $villeFind)
            ->with('nomsChamps', $nomsChamps);
    }



    // public function parking($id)
    // {
    //     $parking = Parking::find($id);
    //     $parkings = DB::table('parkings')->select('nom_parking')->distinct()->get(); 
    //     $villes = Ville::all(); 
    //     return view('pages/parking')
    //         ->with('parking', $parking)
    //         ->with('parkings', $parkings)
    //         ->with('villes', $villes);
    // }

    // public function tousLesParkings()
    // {
    //     $ville = new Ville();
    //     $villes = $ville->all();
    //     $tousLesParkings = [];
    //     foreach ($villes as $ville) {
    //         $parkings = $ville->parkings;
    //         array_push($tousLesParkings, ...$parkings);
    //     }
    //     return view('pages/tousLesParkings')
    //         ->with('parkings', $tousLesParkings)
    //         ->with('villes', $villes);
    // }

    // public function save(Request $request)
    // {

    //     foreach ($request->all() as $key => $value) {
    //         if (str_starts_with($key, 'id_')) {
    //             $id = substr($key, 3);

                
    //             $validatedData = $request->validate([
    //                 'ville_' . $id => 'required',
    //             ]);

    //             $parking = Parking::find($id);
    //             if ($parking) {
    //                 $parking->latitude = $request->input('latitude_' . $id);
    //                 $parking->longitude = $request->input('longitude_' . $id);
    //                 $parking->nombre_place_dispo = $request->input('nombre_place_dispo_' . $id);
    //                 $parking->nombre_place_total = $request->input('nombre_place_total_' . $id);
    //                 $parking->ville_id = $validatedData['ville_' . $id];
    //                 $parking->save();
    //             }
    //         }
    //     }
    //     return back();
    // }



    public function saveVille(Request $request)
    {

        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            return redirect()->route('accueil');
        }
    
        $validatedData = $request->validate([
            'nom' => 'required',
            'code_postal' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
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

        return redirect()->route('villes');
    }



    public function createVille()
    {

        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            return redirect()->route('accueil');
        }

        $villes = Ville::all();
        return view('pages/formAjouterVille',  ['villes' => $villes]);
    }



    public function ajoutVille(Request $request)
{

    if (!Auth::check() || !Auth::user()->hasRole('admin')) {
        return redirect()->route('accueil');
    }

    $validatedData = $request->validate([
        'nom' => 'required',
        'code_postal' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
    ]);
    $ville = new Ville;
    $ville->nom = $request->input('nom');
    $ville->code_postal = $request->input('code_postal');
    $ville->latitude = $request->input('latitude');
    $ville->longitude = $request->input('longitude');
    $ville->save();

    return redirect()->route('villes');
}



public function delete($id)
{
    if (!Auth::check() || !Auth::user()->hasRole('admin')) {
        return redirect()->route('accueil');
    }

    $ville = Ville::findOrFail($id);
    $ville->delete();

    return redirect('/villes');
}
  



    // public function saveParking(Request $request)
    // {
    //     $parking = Parking::find($request->input('id'));
    
    //     if ($parking) {
    //         $parking->nom_parking = $request->input('nom_parking');
    //         $parking->latitude = $request->input('latitude');
    //         $parking->longitude = $request->input('longitude');
    //         $parking->nombre_place_dispo = $request->input('nombre_place_dispo');
    //         $parking->nombre_place_total = $request->input('nombre_place_total');
    
    //         $ville = Ville::where('nom', $request->input('ville'))->first();
    
    //         if ($ville) {
    //             $parking->ville()->associate($ville);
    //         }
    
    //         $parking->save();
    //     } else {
    //         return redirect()->back()->withErrors(['error' => 'Parking not found']);
    //     }
    
    //     return redirect()->route('tousLesParkings');
    // }



    // public function createParking()
    // {
    //     $villes = Ville::all();
    //     return view('pages/formAjouterParking',  ['villes' => $villes]);
    // }


//     public function ajoutParking(Request $request)
// {
//     $parking = new Parking;
//     $parking->nom_parking = $request->input('nom_parking');
//     $parking->ville_id = $request->input('ville_id');
//     $parking->latitude = $request->input('latitude');
//     $parking->longitude = $request->input('longitude');
//     $parking->nombre_place_dispo = $request->input('nombre_place_dispo');
//     $parking->nombre_place_total = $request->input('nombre_place_total');
//     $parking->save();

//     return redirect()->route('tousLesParkings');
// }


// public function delete($id)
// {
//     $parking = Parking::findOrFail($id);
//     $parking->delete();

//     return redirect('/tousLesParkings');
// }
    
}
