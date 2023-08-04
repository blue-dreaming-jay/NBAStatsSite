<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatsController;


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

Route::get('players', function () {
    return view('players');
});

Route::get('players', [PlayersController::class, 'fetch_players']);

Route::get('players/{slug}', [PlayerController::class, 'show']);

Route::get('players/{name}/{year}', [StatsController::class, 'show']);

// Route::get('players/Ike-Anigbogu', function () {
//     return view('player');
// });