<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;

class PagesListeParkingsController extends Controller
{
    public function listeDesParkings()
    {
        $parkings = Parking::all();

        return view('pages/listeDesParkings', compact('parkings'));
    }
}
