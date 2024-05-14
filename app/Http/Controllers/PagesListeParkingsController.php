<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;
use App\Models\Ville;

class PagesListeParkingsController extends Controller
{
    public function listeDesParkings($id)
    {
        $parkings = Parking::where('ville_id', $id)->get();
        $ville = Ville::findOrFail($id);

        return view('pages/listeDesParkings', compact('parkings', 'ville'));
    }
}
