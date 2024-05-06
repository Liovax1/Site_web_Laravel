<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class PagesUtilisateursController extends Controller
{
    public function gestionUtilisateurs()
    {
        $users = Utilisateur::all();

        return view('pages/listeDesParkings', compact('users'));
    }
}
