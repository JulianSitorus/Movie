<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\TvController;

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_post'])->name('register.post');

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/movies', [AuthController::class, 'login_post'])->name(  'login.post');

Route::get('/movies', [MoviesController::class, 'index'])->name('movies.dashboard')->middleware('auth');
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.detail')->middleware('auth');

Route::get('/actors', [ActorsController::class, 'actors_dashboard'])->name('actors.dashboard')->middleware('auth');
Route::get('/actors/page/{page?}', [ActorsController::class, 'actors_dashboard'])->middleware('auth');
Route::get('/actors/{id}', [ActorsController::class, 'actors_detail'])->name('actors.detail')->middleware('auth');

Route::get('/tv', [TvController::class, 'tv_dashboard'])->name('tv.dashboard')->middleware('auth');
Route::get('/tv/{id}', [TvController::class, 'tv_detail'])->name('tv.detail')->middleware('auth');
