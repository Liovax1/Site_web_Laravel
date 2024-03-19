<?php

namespace App\Http\Controllers;

use App\Models\NoeudLora ;
use Schema ;
use App\Models\Parking;
use Illuminate\Http\Request;


class PagesNoeudLoraController extends Controller
{
    public function all(){
        $noeud_lora = new NoeudLora();
        $noeud_loras = $noeud_lora->all();
        $parkings = Parking::all(); 
        $nomsChamps = Schema::getColumnListing($noeud_lora->getTable());
        return view ('pages/noeud_loras')
            ->with('noeud_loras', $noeud_loras)
            ->with('parkings', $parkings) 
            ->with('nomsChamps', $nomsChamps);  
    }



    public function saveNoeud(Request $request)
{
    foreach ($request->all() as $key => $value) {
        if (str_starts_with($key, 'id_')) {
            $id = substr($key, 3);
            $noeud_lora = NoeudLora::find($id);
            if ($noeud_lora) {
                $noeud_lora->nom_noeud = $request->input('nom_noeud_'.$id);
                $noeud_lora->type_noeud = $request->input('type_noeud_'.$id);
                $noeud_lora->dev_eui = $request->input('dev_eui_'.$id);
                $noeud_lora->parking_id = $request->input('parking_id_'.$id); 
                $noeud_lora->save();
            }
        }
    }
    return back();
}

public function edit() {
    $noeud_loras = NoeudLora::all();
    $parkings = Parking::all(); 
    return view('noeud_loras', ['noeud_loras' => $noeud_loras, 'parkings' => $parkings]);
}

}

