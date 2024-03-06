<?php

namespace App\Http\Controllers;

use App\Models\NoeudLora ;
use Schema ;


use Illuminate\Http\Request;

class PagesNoeudLoraController extends Controller
{
    public function all(){
        $noeud_lora = new NoeudLora();
        $noeud_loras = $noeud_lora->all();
        $nomsChamps = Schema::getColumnListing($noeud_lora->getTable());
        //dd($nomsChamps); // permet le débogage
        return view ('pages/noeud_loras')
            ->with('noeud_loras', $noeud_loras)
            ->with('nomsChamps', $nomsChamps);  
    }
}
