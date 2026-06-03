<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FilmController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
    ->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])
    ->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');
Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->name('categories.show');


Route::get('/films', [FilmController::class, 'index'])
    ->name('films.index');
Route::get('/films/create', [FilmController::class, 'create'])
    ->name('films.create');
Route::post('/films', [FilmController::class, 'store'])
    ->name('films.store');
Route::get('/films/{film}/edit', [FilmController::class, 'edit'])
    ->name('films.edit');
Route::put('/films/{film}', [FilmController::class, 'update'])
    ->name('films.update');