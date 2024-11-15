<x-app :titre="'Détails de la Recette : ' . $recette->nom">
    <style>
        /* Style général pour la page de détails */
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #555;
        }

        strong {
            font-weight: bold;
        }

        img {
            width: 100px;
            height: 100px;
            margin-top: 10px;
            border-radius: 8px;
        }

        /* Style pour les boutons et les liens */

        button {
            padding: 8px 15px;
            background-color: #ff4d4d;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Style du formulaire de suppression */
        form {
            display: inline;
        }

        /* Mise en forme du conteneur pour la recette */
        div {
            margin-bottom: 20px;
        }
    </style>

    <!-- Titre de la page avec le nom de la recette -->
    <h1>{{ $recette->nom }}</h1>

    <div>
        <!-- Affichage de la description de la recette -->
        <p><strong>Description :</strong> {{ $recette->description }}</p>
        <!-- Affichage de la catégorie de la recette -->
        <p><strong>Catégorie :</strong> {{ $recette->categorie }}</p>
        <!-- Affichage du nombre de personnes que la recette sert -->
        <p><strong>Nombre de personnes :</strong> {{ $recette->nb_personnes }}</p>
        <!-- Affichage du temps de préparation de la recette -->
        <p><strong>Temps de préparation :</strong> {{ $recette->temps_preparation }} minutes</p>
        <!-- Affichage du coût de la recette -->
        <p><strong>Coût :</strong> {{ $recette->cout }}</p>
        <!-- Affichage de l'image de la recette -->
        <img src="{{ Vite::asset('public/storage/' . $recette->visuel) }}" alt="Image de {{ $recette->nom }}">
    </div>

    <div>
        <!-- Lien pour modifier la recette -->
        <a href="{{ route('recettes.edit', $recette) }}">Modifier</a> |
        <!-- Formulaire pour supprimer la recette -->
        <form action="{{ route('recettes.destroy', $recette) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <!-- Bouton pour confirmer la suppression de la recette -->
            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">Supprimer</button>
        </form>
        <!-- Lien pour retourner à la liste des recettes -->
        <a href="{{ route('recettes.index') }}">Retour à la liste des recettes</a>
    </div>
</x-app>
