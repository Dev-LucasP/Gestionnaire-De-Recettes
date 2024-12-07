<x-app :titre="'Détails de la Recette : ' . $recette->nom">

    <div class="show-recette">
        <h1>{{ $recette->nom }}</h1>

        <div>
            <p><strong>Description :</strong> {{ $recette->description }}</p>
            <p><strong>Catégorie :</strong> {{ $recette->categorie }}</p>
            <p><strong>Nombre de personnes :</strong> {{ $recette->nb_personnes }}</p>
            <p><strong>Temps de préparation :</strong> {{ $recette->temps_preparation }} minutes</p>
            <p><strong>Coût :</strong> {{ $recette->cout }}</p>
            <p><strong>Liste des ingrédients :</strong></p>
            <ul class="ingredients">
                @foreach ($recette->ingredients as $ingredient)
                    <x-ingredient :ingredient="$ingredient" />
                @endforeach
            </ul>
            <p><strong>Visuel de la recette :</strong></p>
            <img src="{{ Vite::asset('public/storage/' . $recette->visuel) }}" alt="Image de {{ $recette->nom }}">
        </div>

        <div class="actions">
            <a href="{{ route('recettes.edit', $recette) }}">Modifier</a> |
            <form action="{{ route('recettes.destroy', $recette) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">Supprimer</button>
            </form>
            <a href="{{ route('recettes.index') }}">Retour à la liste des recettes</a>
        </div>
    </div>
</x-app>
