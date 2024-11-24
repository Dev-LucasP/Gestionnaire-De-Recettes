<?php

use Illuminate\Support\Facades\Route;
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
    return view('dashboard');
})->middleware(['auth'])->name('home');

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('home');

