@extends('layouts.app')

@section('content')
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
        <h3>Visuel actuel :</h3>
        <img src="{{ Storage::url($recette->visuel) }}" alt="Visuel de la recette" style="max-width: 200px;">
    @endif

@endsection
