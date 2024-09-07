<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\TvController;


Route::get('/', [MoviesController::class, 'index'])->name('movies.dashboard');
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.detail');

Route::get('/actors', [ActorsController::class, 'actors_dashboard'])->name('actors.dashboard');
Route::get('/actors/page/{page?}', [ActorsController::class, 'actors_dashboard']);
Route::get('/actors/{id}', [ActorsController::class, 'actors_detail'])->name('actors.detail');

Route::get('/tv', [TvController::class, 'tv_dashboard'])->name('tv.dashboard');
Route::get('/tv/{id}', [TvController::class, 'tv_detail'])->name('tv.detail');
