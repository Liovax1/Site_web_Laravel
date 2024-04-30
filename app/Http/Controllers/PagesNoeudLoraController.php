<?php

namespace App\Http\Controllers;

use App\Models\NoeudLora;
use Schema;
use App\Models\Parking;
use Illuminate\Http\Request;


class PagesNoeudLoraController extends Controller
{
    public function all()
    {
        $noeud_lora = new NoeudLora();
        $noeud_loras = $noeud_lora->all();
        $parkings = Parking::all();
        $nomsChamps = Schema::getColumnListing($noeud_lora->getTable());
        return view('pages/tousLesNoeudsLoras')
            ->with('noeud_loras', $noeud_loras)
            ->with('parkings', $parkings)
            ->with('nomsChamps', $nomsChamps);
    }



    public function noeudLora($id)
    {
        $noeudLora = new NoeudLora();
        $noeudLoraFind = $noeudLora->find($id);
        $nomsChamps = Schema::getColumnListing($noeudLora->getTable());
        $parkings = Parking::all(); // Ajout de cette ligne
        return view('pages/noeud_lora')
            ->with('noeudLoraFind', $noeudLoraFind)
            ->with('nomsChamps', $nomsChamps)
            ->with('parkings', $parkings); // Ajout de cette ligne
    }





    public function saveNoeud(Request $request)
    {
        $validatedData = $request->validate([
            'nom_noeud' => 'required',
            'dev_eui' => 'required',
        ]);
        $noeud_loras = NoeudLora::all();
        foreach ($noeud_loras as $noeud_lora) {
            $id = $noeud_lora->id;
            $noeud_lora->nom_noeud = $request->input('nom_noeud_' . $id) ?? $noeud_lora->nom_noeud;
            $noeud_lora->type_noeud = $request->input('type_noeud_' . $id) ?? $noeud_lora->type_noeud;
            $noeud_lora->dev_eui = $request->input('dev_eui_' . $id) ?? $noeud_lora->dev_eui;
            $noeud_lora->parking_id = $request->input('parking_id_' . $id) ?? $noeud_lora->parking_id;
            $noeud_lora->save();
        }
        return redirect()->route('tousLesNoeudsLoras');
    }




    public function edit()
    {
        $noeud_loras = NoeudLora::all();
        $parkings = Parking::all();
        return view('noeud_loras', ['noeud_loras' => $noeud_loras, 'parkings' => $parkings]);
    }

    public function createNoeud()
    {
        $parkings = Parking::all();
        return view('pages/formAjouterNoeud',  ['parkings' => $parkings]);
    }


    public function ajoutNoeud(Request $request)
{
    $validatedData = $request->validate([
        'nom_noeud' => 'required',
        'dev_eui' => 'required',
    ]);
    $noeud_lora = new NoeudLora;
    $noeud_lora->nom_noeud = $request->input('nom_noeud');
    $noeud_lora->type_noeud = $request->input('type_noeud');
    $noeud_lora->dev_eui = $request->input('dev_eui');
    $noeud_lora->parking_id = $request->input('parking_id');
    $noeud_lora->save();

    return redirect()->route('tousLesNoeudsLoras');
}
  

public function delete($id)
{
    $noeud_lora = NoeudLora::findOrFail($id);
    $noeud_lora->delete();

    return redirect('/tousLesNoeudsLoras');
}


}
