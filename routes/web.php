<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SteamController;

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

Route::get('/', [MainController::class, 'main']);
Route::get('steam', [AuthController::class, 'redirectToSteam'])->name('steam');
Route::get('handle', [AuthController::class, 'handle'])->name('handle');
Route::get('profile', [MainController::class, 'profile']);
Route::get('logout', [SteamController::class, 'getLogout']);
Route::get('auth', [MainController::class, 'auth']);
Route::get('reg', [MainController::class, 'reg']);

Route::post('reg_form', [MainController::class, 'register'])->name('reg_form');
Route::post('auth_form', [MainController::class, 'authentication'])->name('auth_form');
Route::post('review', [MainController::class, 'get_reviews'])->name('review');
