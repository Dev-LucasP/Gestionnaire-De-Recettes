<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Recette</title>

    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #4caf50;
            font-size: 2rem;
            margin-bottom: 30px;
        }

        /* Formulaire de création */
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
        .form-group textarea,
        .form-group select {
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
    </style>
</head>
<body>

<h1>Créer une Nouvelle Recette</h1>

<form action="{{ route('recettes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Nom de la recette -->
    <div class="form-group">
        <label for="nom">Nom de la recette :</label>
        <input type="text" id="nom" name="nom" required>
    </div>

    <!-- Description de la recette -->
    <div class="form-group">
        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>
    </div>

    <!-- Catégorie -->
    <div class="form-group">
        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie" required>
            <option value="dessert">Dessert</option>
            <option value="plat principal">Plat Principal</option>
            <option value="entrée">Entrée</option>
        </select>
    </div>

    <!-- Nombre de personnes -->
    <div class="form-group">
        <label for="nb_personnes">Nombre de personnes :</label>
        <input type="number" id="nb_personnes" name="nb_personnes" min="1" required>
    </div>

    <!-- Temps de préparation -->
    <div class="form-group">
        <label for="temps_preparation">Temps de préparation (minutes) :</label>
        <input type="number" id="temps_preparation" name="temps_preparation" min="1" required>
    </div>

    <!-- Coût -->
    <div class="form-group">
        <label for="cout">Coût (€) :</label>
        <input type="number" id="cout" name="cout" step="0.01" min="0" required>
    </div>

    <!-- Choix du visuel -->
    <div class="form-group">
        <label for="visuel">Visuel :</label>
        <input type="file" id="visuel" name="visuel" accept="image/*">
    </div>

    <button type="submit">Créer la recette</button>
</form>

</body>
</html>
