<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;

class PagesAccueilController extends Controller
{
    // Appel de la vue accueil
    public function accueil() {
        $parkings = Parking::with('Ville')->get();
        return view('pages/accueil', compact('parkings'));
    }
}
