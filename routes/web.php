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
    return redirect()->route('dashboard');
});


Route::get('/login', [\App\Http\Controllers\ProfileController::class, 'login'])->name('login');
Route::post('/loginSubmit', [\App\Http\Controllers\ProfileController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('/dashboard', [\App\Http\Controllers\ProfileController::class, 'index'])->name('dashboard');
Route::get('/profile_list', [\App\Http\Controllers\ProfileController::class, 'profile_list'])->name('profile_list');
