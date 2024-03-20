<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesAproposController extends Controller
{
    // Appel de la vue apropos
    public function apropos(){
    return view ('pages/apropos') ;
    }
}