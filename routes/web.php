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
'App\Http\Controllers\PagesConnexionController@connexion')->name('connexion') ;

//Route::post('/connexion', 'PagesConnexionController@connexion')->name('connexion');


// Route::middleware(['auth'])->group(function () {
//     Route::get('/', 'HomeController@index')->name('connexion');
// });

// Auth::routes();