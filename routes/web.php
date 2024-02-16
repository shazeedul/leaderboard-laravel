<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaderBoardController;
use App\Http\Controllers\Auth\ClubRegistrationController;

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
Route::get('/register/create-club-account', [App\Http\Controllers\Auth\ClubRegistrationController::class, 'showRegistrationForm'])->name('club.register');
Route::post('/register/create-club-account', [App\Http\Controllers\Auth\ClubRegistrationController::class, 'register'])->name('club.register.post');
Route::get('/club', [App\Http\Controllers\ClubController::class, 'index'])->name('club.home');
Route::get('/club/details', [App\Http\Controllers\ClubController::class, 'create'])->name('club.details');
Route::post('/club/details', [App\Http\Controllers\ClubController::class, 'store'])->name('club.details.post');

Route::get('/admin/leaderboard', [App\Http\Controllers\LeaderBoardController::class, 'index'])->name('leaderboard.index');
Route::get('/admin/leaderboard/create', [App\Http\Controllers\LeaderBoardController::class, 'create'])->name('leaderboard.create');
Route::post('/admin/leaderboard/create', [App\Http\Controllers\LeaderBoardController::class, 'store'])->name('leaderboard.create.post');
Route::get('/admin/leaderboard/{leaderBoard}', [App\Http\Controllers\LeaderBoardController::class, 'show'])->name('leaderboard.show');
Route::get('/admin/leaderboard/{leaderBoard}/edit', [App\Http\Controllers\LeaderBoardController::class, 'edit'])->name('leaderboard.edit');
Route::put('/admin/leaderboard/{leaderBoard}/edit', [App\Http\Controllers\LeaderBoardController::class, 'update'])->name('leaderboard.edit.put');
Route::delete('/admin/leaderboard/{leaderBoard}', [App\Http\Controllers\LeaderBoardController::class, 'destroy'])->name('leaderboard.delete');
