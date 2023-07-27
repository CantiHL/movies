<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\TVController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

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
Route::get('/',[MoviesController::class,'index'])->name('movies.index');
Route::get('/movies/{id}',[MoviesController::class,'show'])->name('movies.show');

Route::get('/actors',[ActorsController::class,'index'])->name('actors.index');
Route::get('/actors/page/{page?}',[ActorsController::class,'index']);
Route::get('/actors/{id}',[ActorsController::class,'show'])->name('actors.show');

Route::get('/tv',[TVController::class,'index'])->name('tv.index');
Route::get('/tv/{id}',[TVController::class,'show'])->name('tv.show');
