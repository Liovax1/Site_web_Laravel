<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ville;

class UserController extends Controller
{
    public function gestionUser()
        {

            if (!Auth::check() || !Auth::user()->hasRole('admin')) {
                return redirect()->route('accueil')->with('popupScript', "alert('Vous n'êtes pas autorisé à consulter cette page');");
            }


            $users = user::all();
            return view('pages/gestionUser')->with('users', $users);
        }
    
        public function createUser(){
            $roles = DB::table('roles')->get();
            $villes = Ville::all();
            return view ('pages/addUser', compact('roles', 'villes'));
        }
    
        public function storeUser(request $request){
            $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->remember_token = $request->input('password');
        $password = bcrypt($user->remember_token);
        $user->password = $password;
        $user->role_id = $request->input('role_id');
        $user->ville_id = $request->input('ville_id');
        $user->save();
        return redirect( url('gestionDesUtilisateurs'));

        }
        
        public function editUser($id){
            if (!Auth::check() || !Auth::user()->hasRole('admin')) {
                return redirect()->route('accueil')->with('popupScript', "alert('Vous n'êtes pas autorisé à consulter cette page');");
            }

            $userFind = new User();
            $userFind = $userFind->find($id);
            $villes = Ville::all();
            $roles = DB::table('roles')->get();
            if (!is_null($userFind))
            return view ('pages/editUser', compact('userFind', 'roles', 'villes'))
                ->with('userFind', $userFind);
            else
            return redirect( url('gestionDesUtilisateurs'));
        }
    
        public function updateUser(Request $request){
            $userUpDate = new User();
            $userUpDate = $userUpDate->find($request->input('id'));
            $userUpDate->name = $request->input('name');
            $userUpDate->email = $request->input('email');
            $userUpDate->remember_token = $request->input('password');
            $password = bcrypt($userUpDate->remember_token);
            $userUpDate->password = $password;
            $userUpDate->role_id = $request->input('role_id');
            $userUpDate->ville_id = $request->input('ville_id');
            $userUpDate->save();
            return redirect( url('gestionDesUtilisateurs'));
        }
    
        public function deleteUser($id){
            if (Auth::check() && (Auth::user()->hasRole('admin'))) {
                $user = User::find($id);
                if ($user) {
                    $user->delete();
                }
                return redirect(url('gestionDesUtilisateurs'))->with('popupScript', "alert('Utilisateur supprimé avec succès');");
            } else {
                return response()->view('pages.403', [], 403);
            }
        }
    }