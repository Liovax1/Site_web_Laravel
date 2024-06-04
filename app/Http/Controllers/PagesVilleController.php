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



   
    public function saveVille(Request $request)
    {
        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            return redirect()->route('accueil');
        }
    
        $validatedData = $request->validate([
            'nom' => 'required|alpha|max:255',
            'code_postal' => 'required|digits:5',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
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
        'nom' => 'required|alpha|max:255',
        'code_postal' => 'required|digits:5',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
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
  
}
