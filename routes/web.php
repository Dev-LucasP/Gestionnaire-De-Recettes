<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecetteController;

Route::get('/', function () {
    return view('statiques.accueil', ['titre' => 'Accueil']);
})->name('accueil');

Route::get('/presentation', function () {
    return view('statiques.presentation', ['titre' => 'Présentation']);
})->name('presentation');

Route::get('/contact', function () {
    return view('statiques.contact', ['titre' => 'Contact']);
})->name('contact');

Route::resource('recettes', RecetteController::class)->middleware('auth');

Route::post('/recettes/{id}/upload', [RecetteController::class, 'upload'])->name('recettes.upload');

Route::get('/home', function () {
    return redirect()->route('accueil');
})->middleware(['auth'])->name('home');

Route::middleware(['auth'])->get('/dashboard', function () {
    return redirect()->route('accueil');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/recettes/create', [RecetteController::class, 'create'])->name('recettes.create');
    Route::post('/recettes', [RecetteController::class, 'store'])->name('recettes.store');
});

Route::resource('ingredients', IngredientController::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
    Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
});
