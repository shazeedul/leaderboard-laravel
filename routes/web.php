<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/club/register', [App\Http\Controllers\Auth\ClubRegistrationController::class, 'showRegistrationForm'])->name('club.register');
Route::post('/club/register', [App\Http\Controllers\Auth\ClubRegistrationController::class, 'register'])->name('club.register.post');
Route::get('/club', [App\Http\Controllers\ClubController::class, 'index'])->name('club.index');
Route::get('/club/details', [App\Http\Controllers\ClubController::class, 'create'])->name('club.details');
Route::post('/club/details', [App\Http\Controllers\ClubController::class, 'store'])->name('club.details.post');
