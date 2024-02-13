<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ville;
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
}
