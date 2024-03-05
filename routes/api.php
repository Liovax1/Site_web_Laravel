<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/setPlaceDispo/{idParking}/{nombrePlaceDispo}', 'App\Http\Controllers\ApiGaBuZoMeuController@setPlaceDispo')->name('setPlaceDispo');
Route::get('/getInfoNoeud/{infoNoeudParking}', 'App\Http\Controllers\ApiGaBuZoMeuController@getInfoNoeud')->name('getInfoNoeud');
// Route::get('/wsParking/show/{id}', 'App\Http\Controllers\ParkingController@show');
// Route::get('/wsParking/delete/{id}', 'App\Http\Controllers\ParkingController@delete');
// Route::post('/wsParking/add','App\Http\Controllers\ParkingController@add');