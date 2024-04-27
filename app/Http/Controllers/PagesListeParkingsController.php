<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;

class PagesListeParkingsController extends Controller
{
        // Appel de la vue listeDesParkings
    public function listeDesParkings()
    {
        // Récupère tous les parkings depuis la base de données
        $parkings = Parking::all();

        // Passe les données des parkings à la vue
        return view('pages/listeDesParkings', compact('parkings'));
    }
}
