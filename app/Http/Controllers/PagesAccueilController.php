<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesAccueilController extends Controller
{
    // Appel de la vue accueil
    public function accueil(){
    return view ('pages/accueil') ;
    }
}
