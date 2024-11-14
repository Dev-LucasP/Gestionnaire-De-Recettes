<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Recette</title>

    <!-- Inclure le fichier CSS via Vite -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">
</head>
<body>

<h1>Créer une Nouvelle Recette</h1>

<form action="{{ route('recettes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Nom de la recette -->
    <div>
        <label for="nom">Nom de la recette :</label>
        <input type="text" id="nom" name="nom" required>
    </div>

    <!-- Description de la recette -->
    <div>
        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>
    </div>

    <!-- Catégorie -->
    <div>
        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie" required>
            <option value="dessert">Dessert</option>
            <option value="plat principal">Plat Principal</option>
            <option value="entrée">Entrée</option>
        </select>
    </div>

    <!-- Nombre de personnes -->
    <div>
        <label for="nb_personnes">Nombre de personnes :</label>
        <input type="number" id="nb_personnes" name="nb_personnes" min="1" required>
    </div>

    <!-- Temps de préparation -->
    <div>
        <label for="temps_preparation">Temps de préparation (minutes) :</label>
        <input type="number" id="temps_preparation" name="temps_preparation" min="1" required>
    </div>

    <!-- Coût -->
    <div>
        <label for="cout">Coût (€) :</label>
        <input type="number" id="cout" name="cout" step="0.01" min="0" required>
    </div>

    <!-- Choix du visuel -->
    <div>
        <label for="visuel">Visuel :</label>
        <input type="file" id="visuel" name="visuel" accept="image/*">
    </div>

    <button type="submit">Créer la recette</button>
</form>
</body>
</html>
