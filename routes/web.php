<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropdownController;

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

Route::get('/', [DropdownController::class, 'index']);
Route::get('get-state-list', [DropdownController::class, 'getStateList']);
Route::get('get-city-list', [DropdownController::class, 'getCityList']);