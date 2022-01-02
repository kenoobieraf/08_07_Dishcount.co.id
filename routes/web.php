<?php

use App\Http\Controllers\PromoController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/promo', [PromoController::class, 'index']);
Route::get('/create', [PromoController::class, 'create']);
Route::get('/edit-promo/{id}', [PromoController::class, 'edit']);

