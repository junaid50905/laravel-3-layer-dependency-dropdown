<?php

use App\Http\Controllers\CountryContoller;
use App\Http\Controllers\DropdownController;
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

Route::get('/', [DropdownController::class, 'index']);
Route::post('api/fetch-state', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-city', [DropdownController::class, 'fetchCity']);
