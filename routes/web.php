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

Route::get(
    '/villes',
    'App\Http\Controllers\PagesVilleController@villes'
)->name('villes');


Route::get('/ville/{id}', 'App\Http\Controllers\PagesVilleController@ville')->name('ville');

Route::get('/formAjouterVille','App\Http\Controllers\PagesVilleController@createVille')->name('formAjouterVille');

Route::get('/parking/{id}', 'App\Http\Controllers\PagesParkingController@parking')->name('parking');

Route::get('/tousLesParkings','App\Http\Controllers\PagesParkingController@tousLesParkings')->name('tousLesParkings');

Route::get('/formAjouterParking','App\Http\Controllers\PagesParkingController@createParking')->name('formAjouterParking');

Route::get('/tousLesNoeudsLoras','App\Http\Controllers\PagesNoeudLoraController@all')->name('tousLesNoeudsLoras');


Route::get('/noeud_lora/{id}','App\Http\Controllers\PagesNoeudLoraController@noeudLora')->name('noeud_lora');

Route::get('/formAjouterNoeud','App\Http\Controllers\PagesNoeudLoraController@createNoeud')->name('formAjouterNoeud');





Route::post('/saveVille', 'App\Http\Controllers\PagesVilleController@saveVille');

Route::post('/ajoutVille', 'App\Http\Controllers\PagesVilleController@ajoutVille');

Route::delete('/ville/{id}/delete', 'App\Http\Controllers\PagesVilleController@delete');

Route::post('/saveParking', 'App\Http\Controllers\PagesParkingController@saveParking');

Route::post('/ajoutParking', 'App\Http\Controllers\PagesParkingController@ajoutParking');

Route::delete('/parking/{id}/delete', 'App\Http\Controllers\PagesParkingController@delete');

Route::post('/save', 'App\Http\Controllers\PagesParkingController@save');

Route::post('/saveNoeud', 'App\Http\Controllers\PagesNoeudLoraController@saveNoeud');

Route::post('/ajoutNoeud', 'App\Http\Controllers\PagesNoeudLoraController@ajoutNoeud');

Route::delete('/noeud_lora/{id}/delete', 'App\Http\Controllers\PagesNoeudLoraController@delete');





Route::get('/accueil','App\Http\Controllers\PagesAccueilController@accueil')->name('accueil');


Route::get('/connexion','App\Http\Controllers\Auth\LoginController@connexion')->name('connexion') ;

Auth::routes();


Route::middleware(['auth', 'role:gestionnaire_place_parking'])->get('pages/apropos', function () {})->name('apropos');
