<x-app :titre="'Détails de la Recette : ' . $recette->nom">

    <div class="show-recette">
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
            <p><strong>Liste des ingrédients :</strong></p>
            <ul class="ingredients">
                @foreach ($recette->ingredients as $ingredient)
                    <x-ingredient :ingredient="$ingredient" />
                @endforeach
            </ul>
            <!-- Affichage de l'image de la recette -->
            <p><strong>Visuel de la recette :</strong></p>
            <img src="{{ Vite::asset('public/storage/' . $recette->visuel) }}" alt="Image de {{ $recette->nom }}">
        </div>

        <div class="actions">
            <!-- Lien pour modifier la recette -->
            <a href="{{ route('recettes.edit', $recette) }}">Modifier</a> |
            <!-- Formulaire pour supprimer la recette -->
            <form action="{{ route('recettes.destroy', $recette) }}" method="POST">
                @csrf
                @method('DELETE')
                <!-- Bouton pour confirmer la suppression de la recette -->
                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">Supprimer</button>
            </form>
            <!-- Lien pour retourner à la liste des recettes -->
            <a href="{{ route('recettes.index') }}">Retour à la liste des recettes</a>
        </div>
    </div>
</x-app>
