<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetteController;
=======
use App\Http\Controllers\RecetteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recettes', [RecetteController::class,'index'])->name('recettes.index');
>>>>>>> origin/bug-affichage-recette

Route::get('/', function () {
    return view('statiques.accueil', ['titre' => 'Accueil']);
})->name('accueil');

Route::get('/presentation', function () {
<<<<<<< HEAD
    return view('statiques.presentation', ['titre' => 'Présentation']);
=======
    return view('statiques.presentation', ['titre' => 'Presentation']);
>>>>>>> origin/bug-affichage-recette
})->name('presentation');

Route::get('/contact', function () {
    return view('statiques.contact', ['titre' => 'Contact']);
})->name('contact');
<<<<<<< HEAD

Route::resource('recettes', RecetteController::class);
=======
>>>>>>> origin/bug-affichage-recette
