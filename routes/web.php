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

Route::get('/villes',
    'App\Http\Controllers\PagesVilleController@villes')->name('villes');


Route::get(
        '/ville/{id}',
        'App\Http\Controllers\PagesVilleController@ville')->name('ville');


Route::get('/parkings/{id}',
'App\Http\Controllers\PagesVilleController@parkings')->name('parkings');
Route::get('/noeud_loras-all',
'App\Http\Controllers\PagesNoeudLoraController@all')->name('noeud_loras-all') ;


Route::get('/tousLesParkings',
'App\Http\Controllers\PagesVilleController@tousLesParkings')->name('tousLesParkings');


Route::post('/saveVille', 'App\Http\Controllers\PagesVilleController@saveVille');

Route::post('/save', 'App\Http\Controllers\PagesVilleController@save');



