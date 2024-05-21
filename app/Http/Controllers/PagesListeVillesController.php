<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Parking;


class PagesListeVillesController extends Controller
{
    public function listeDesVilles()
    {
        $villes = Ville::all();

        foreach ($villes as $ville) {
            $ville->nombre_total_parkings = Parking::where('ville_id', $ville->id)->count();
        }

        return view('pages/listeDesVilles', compact('villes'));
    }
}
