<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/noeud_loras-all',
'App\Http\Controllers\PagesNoeudLoraController@all')->name('noeud_loras-all') ;

Route::get('/accueil',
'App\Http\Controllers\PagesAccueilController@accueil')->name('accueil') ;

Route::get('/apropos',
'App\Http\Controllers\PagesAproposController@apropos')->name('apropos') ;

Route::get('/connexion',
'App\Http\Controllers\Auth\LoginController@connexion')->name('connexion') ;

Auth::routes();

// Route::get('/apropos',
// [UserController::class, 'index'])->middleware('can:viewAny,App\Models\User');

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
