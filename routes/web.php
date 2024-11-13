<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetteController;

Route::get('/', function () {
    // Route pour afficher la page d'accueil
    return view('statiques.accueil', ['titre' => 'Accueil']);
})->name('accueil');

Route::get('/presentation', function () {
    // Route pour afficher la page de présentation
    return view('statiques.presentation', ['titre' => 'Présentation']);
})->name('presentation');

Route::get('/contact', function () {
    // Route pour afficher la page de contact
    return view('statiques.contact', ['titre' => 'Contact']);
})->name('contact');

// Route pour afficher la liste des recettes
Route::get('/recettes', [RecetteController::class, 'index'])->name('recettes.index');

// Route pour afficher le formulaire de création de recette
Route::get('/recettes/create', [RecetteController::class, 'create'])->name('recettes.create');

// Route pour enregistrer une nouvelle recette
Route::post('/recettes', [RecetteController::class, 'store'])->name('recettes.store');

// Route pour afficher une recette spécifique
Route::get('/recettes/{recette}', [RecetteController::class, 'show'])->name('recettes.show');

// Route pour afficher le formulaire d'édition d'une recette
Route::get('/recettes/{recette}/edit', [RecetteController::class, 'edit'])->name('recettes.edit');

// Route pour mettre à jour une recette existante
Route::put('/recettes/{recette}', [RecetteController::class, 'update'])->name('recettes.update');

// Route pour supprimer une recette
Route::delete('/recettes/{recette}', [RecetteController::class, 'destroy'])->name('recettes.destroy');
