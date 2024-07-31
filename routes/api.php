<?php

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TMDBController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//API for TMDB
Route::get('/movies/search', [TMDBController::class, 'search'])->name('movies.search');
Route::get('/movies/top100', [TMDBController::class, 'getTop100Movies'])->name('gettop');
Route::get('/tmdb', [TMDBController::class, 'tmdbIndex'])->name('movie.tmdb');
Route::get('/100', [TMDBController::class, 'topTMDB'])->name('100.tmdb');

Route::get('/movie/show', [MovieController::class, 'show'])->name('movie.show');
Route::post('/movie/store', [MovieController::class, 'store'])->name('movie.store');
// Route::get('/movie/{movie}/edit', [MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movie/{movie}/update', [MovieController::class, 'update'])->name('movie.update');
Route::delete('/movie/{movie}/destroy', [MovieController::class, 'destroy'])->name('movie.destroy');



