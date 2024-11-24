<x-app :titre="$titre">
    <!-- Style CSS intégré directement dans le fichier index.blade.php -->
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Titre principal */
        h1 {
            text-align: center;
            color: #4caf50;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        /* Formulaire de filtrage */
        form {
            text-align: center;
            margin-bottom: 30px;
        }

        form select {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        form input[type="submit"] {
            padding: 10px 15px;
            font-size: 1rem;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Liste des recettes */
        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            background-color: #fff;
            margin: 15px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        ul li img {
            border-radius: 5px;
            margin: 10px 0;
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        ul li strong {
            font-size: 1.2rem;
            color: #333;
        }

        /* Boutons d'action */
        .btn {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
            margin: 5px;
            transition: background-color 0.3s, transform 0.2s;
            display: inline-block;
            text-align: center;
        }

        .btn-info {
            background-color: #2196f3;
        }

        .btn-info:hover {
            background-color: #1976d2;
        }

        .btn-primary {
            background-color: #3f51b5;
        }

        .btn-primary:hover {
            background-color: #303f9f;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        .btn-success {
            background-color: #4caf50;
        }

        .btn-success:hover {
            background-color: #388e3c;
        }

        /* Lien créer une recette */
        a.btn-success {
            display: block;
            margin: 20px auto;
            text-align: center;
            width: fit-content;
        }
    </style>

    <h1>Liste des Recettes</h1>

    <!-- Formulaire pour filtrer les recettes par catégorie -->
    <form action="{{ route('recettes.index') }}" method="get">
        <select name="cat">
            <option value="All" @if($cat == 'All') selected @endif>-- Toutes catégories --</option>
            @foreach($categories as $categorie)
                <option value="{{ $categorie }}" @selected($cat == $categorie)>{{ $categorie }}</option>
            @endforeach
        </select>
        <input type="submit" value="OK">
    </form>

    <ul>
        @foreach ($recettes as $recette)
            <li>
                <strong>{{ $recette->nom }}</strong><br>
                Description : {{ $recette->description }}<br>
                Catégorie : {{ $recette->categorie }}<br>
                Nombre de personnes : {{ $recette->nb_personnes }}<br>
                Temps de préparation : {{ $recette->temps_preparation }} minutes<br>
                Coût : {{ $recette->cout }}<br>
                ID d'utilisateur : {{ $recette->user_id }}<br>
                <img src="{{ Vite::asset('public/storage/' . $recette->visuel) }}" alt="Image de {{ $recette->nom }}" style="width: 100px; height: 100px;">

                <!-- Bouton pour voir les détails de la recette -->
                <a href="{{ route('recettes.show', $recette->id) }}" class="btn btn-info">Voir les détails</a>

                <!-- Bouton pour modifier la recette -->
                <a href="{{ route('recettes.edit', $recette->id) }}" class="btn btn-primary">Modifier</a>

                <!-- Formulaire pour supprimer la recette -->
                <form action="{{ route('recettes.destroy', $recette->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Lien pour créer une nouvelle recette -->
    <a href="{{ route('recettes.create') }}" class="btn btn-success">Créer une nouvelle recette</a>
</x-app>
