<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesListeParkingsController extends Controller
{
    // Appel de la vue listeDesParkings
    public function listeDesParkings(){
        return view ('pages/listeDesParkings') ;
        }
}
