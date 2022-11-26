<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/info', function () {
    return view('weather');
});

Route::get('/info/about', function () {
    return view('about'); 
});

Route::get('/info', [ WeatherController::class, 'showAllService']);
Route::post('/info', [ WeatherController::class, 'showResponse']);

