<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get(
    '/villes',
    'App\Http\Controllers\PagesVilleController@villes'
)->name('villes');


Route::get('/ville/{id}', 'App\Http\Controllers\PagesVilleController@ville')->name('ville');

Route::get('/parking/{id}', 'App\Http\Controllers\PagesVilleController@parking')->name('parking');

Route::get('/tousLesParkings','App\Http\Controllers\PagesVilleController@tousLesParkings')->name('tousLesParkings');

// Route::get('/parkings/{id}',
// 'App\Http\Controllers\PagesVilleController@parkings')->name('parkings');

Route::get('/tousLesNoeudsLoras','App\Http\Controllers\PagesNoeudLoraController@all')->name('tousLesNoeudsLoras');


Route::get('/noeud_lora/{id}','App\Http\Controllers\PagesNoeudLoraController@noeudLora')->name('noeud_lora');

Route::get('/apropos',
'App\Http\Controllers\PagesAproposController@apropos')->name('apropos') ;

Route::post('/saveVille', 'App\Http\Controllers\PagesVilleController@saveVille');

Route::post('/saveParking', 'App\Http\Controllers\PagesVilleController@saveParking');

Route::post('/save', 'App\Http\Controllers\PagesVilleController@save');

Route::post('/saveNoeud', 'App\Http\Controllers\PagesNoeudLoraController@saveNoeud');

// Route::get('/noeud_loras', 'PagesNoeudLoraController@edit');

Route::get('/accueil','App\Http\Controllers\PagesAccueilController@accueil')->name('accueil');

Route::get('/connexion','App\Http\Controllers\Auth\LoginController@connexion')->name('connexion') ;

Route::get('/listeDesParkings','App\Http\Controllers\PagesListeParkingsController@listeDesParkings')->name('listeDesParkings');


// Liste des utilisateurs
Route::get('/listeDesUtilisateurs', [UserController::class, 'index'])->name('users.index');

// Afficher le formulaire d'ajout d'utilisateur
Route::get('/listeDesUtilisateurs/ajoutUtilisateur', [UserController::class, 'create'])->name('users.create');

// Enregistrer un nouvel utilisateur
Route::post('/listeDesUtilisateurs', [UserController::class, 'store'])->name('users.store');

// Afficher le formulaire de modification d'utilisateur
Route::get('/listeDesUtilisateurs/{user}/editionUtilisateur', [UserController::class, 'edit'])->name('users.edit');

// Mettre à jour un utilisateur
Route::put('/listeDesUtilisateurs/{user}', [UserController::class, 'update'])->name('users.update');

// Supprimer un utilisateur
Route::delete('/listeDesUtilisateurs/{user}', [UserController::class, 'destroy'])->name('users.destroy');






Auth::routes();


// Route::middleware(['auth', 'role:gestionnaire_place_parking'])->get('pages/apropos', function () {})->name('apropos');
// Accès uniquement pour les utilisateurs connectés
// Route::middleware('auth')->group(function () {
//     // Votre route ici
// });

// Route::middleware('can:admin')->group(function () {
//     Route::get('/apropos',
// 'App\Http\Controllers\PagesAproposController@apropos')->name('apropos') ;
// });

// Route::middleware('can:gestionnaire_parking')->group(function () {

// });

// Route::middleware('can:gestionnaire_place_parking')->group(function () {

// });


// Route::middleware(['auth', 'role:gestionnaire_place_parking'])->get('pages/apropos', function () {
//     // Votre logique pour la route '/apropos'
// })->name('apropos');



