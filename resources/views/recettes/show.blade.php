<x-app :titre="'Détails de la Recette : ' . $recette->nom">
    <h1>{{ $recette->nom }}</h1>

    <div>
        <p><strong>Description :</strong> {{ $recette->description }}</p>
        <p><strong>Catégorie :</strong> {{ $recette->categorie }}</p>
        <p><strong>Nombre de personnes :</strong> {{ $recette->nb_personnes }}</p>
        <p><strong>Temps de préparation :</strong> {{ $recette->temps_preparation }} minutes</p>
        <p><strong>Coût :</strong> {{ $recette->cout }}</p>
        <img src="{{ Vite::asset('resources/images/' . $recette->nom . '.jpg') }}" alt="Image de {{ $recette->nom }}" style="width: 100px; height: 100px;">
    </div>

    <div>
        <a href="{{ route('recettes.edit', $recette) }}">Modifier</a> |
        <form action="{{ route('recettes.destroy', $recette) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">Supprimer</button>
        </form>
        <a href="{{ route('recettes.index') }}">Retour à la liste des recettes</a>
    </div>
</x-app>
