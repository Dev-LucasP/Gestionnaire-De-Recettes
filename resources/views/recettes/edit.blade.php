@extends('layouts.app')

@section('content')
    <!-- Style CSS intégré directement dans le fichier edit.blade.php -->
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #4caf50;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Formulaire de modification */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 1.1rem;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .form-group textarea {
            height: 150px;
            resize: vertical;
        }

        .form-group input[type="number"] {
            -moz-appearance: textfield;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Visuel actuel */
        .current-image {
            text-align: center;
            margin-top: 30px;
        }

        .current-image img {
            max-width: 200px;
            border-radius: 5px;
        }
    </style>

    <h2>Modifier la recette</h2>

    <form action="{{ route('recettes.update', $recette->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ $recette->nom }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" required>{{ $recette->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="categorie">Catégorie :</label>
            <input type="text" name="categorie" id="categorie" value="{{ $recette->categorie }}" required>
        </div>

        <div class="form-group">
            <label for="nb_personnes">Nombre de personnes :</label>
            <input type="number" name="nb_personnes" id="nb_personnes" value="{{ $recette->nb_personnes }}" min="1" required>
        </div>

        <div class="form-group">
            <label for="temps_preparation">Temps de préparation (en minutes) :</label>
            <input type="number" name="temps_preparation" id="temps_preparation" value="{{ $recette->temps_preparation }}" min="1" required>
        </div>

        <div class="form-group">
            <label for="cout">Coût :</label>
            <input type="number" name="cout" id="cout" value="{{ $recette->cout }}" min="0" required>
        </div>

        <div class="form-group">
            <label for="visuel">Visuel :</label>
            <input type="file" name="visuel" id="visuel">
        </div>

        <button type="submit">Mettre à jour</button>
    </form>

    @if ($recette->visuel)
        <div class="current-image">
            <h3>Visuel actuel :</h3>
            <img src="{{ Storage::url($recette->visuel) }}" alt="Visuel de la recette">
        </div>
    @endif
@endsection
