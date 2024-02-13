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

Route::get('/wsParking/all', 'App\Http\Controllers\ParkingController@all');
Route::get('/wsParking/show/{id}', 'App\Http\Controllers\ParkingController@show');
Route::get('/wsParking/delete/{id}', 'App\Http\Controllers\ParkingController@delete');
Route::post('/wsParking/add','App\Http\Controllers\parkingController@add')