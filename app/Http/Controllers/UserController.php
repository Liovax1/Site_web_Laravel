<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages/listeDesUtilisateurs')->with('users', $users);
    }

    public function create()
    {
        return view('pages/ajoutUtilisateur');
    }

    public function store(request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->remember_token = $request->input('password');
        $password = bcrypt($user->remember_token);
        $user->password = $password;
        $user->role_id = $request->input('role_id');
        $user->save();
        return redirect( url('listeDesUtilisateurs'));

    }

    public function edit($id)
    {

        $userFind = new User();
        $userFind = $userFind->find($id);
        if (!is_null($userFind))
        return view ('pages/editionUtilisateur')
                ->with('userFind', $userFind);
        else
        return redirect( url('listeDesUtilisateurs'));

    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:6',
            
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => isset($validatedData['password']) ? bcrypt($validatedData['password']) : $user->password,
           
        ]);

        return redirect()->route('pages/listeDesUtilisateurs')->with('success', 'Utilisateur modifié avec succès');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('pages/listeDesUtilisateurs')->with('success', 'Utilisateur supprimé avec succès');
    }
}