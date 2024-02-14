<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
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
}
