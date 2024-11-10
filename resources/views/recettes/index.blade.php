<x-app :titre="$titre">
    <h1>Liste des Recettes</h1>

    <a href="{{ route('recettes.create') }}" class="btn btn-primary">Créer une nouvelle recette</a>

    <ul>
        @foreach ($recettes as $recette)
            <li>
                <strong>{{ $recette->nom }}</strong><br>
                Description : {{ $recette->description }}<br>
                Catégorie : {{ $recette->categorie }}<br>
                Nombre de personnes : {{ $recette->nb_personnes }}<br>
                Temps de préparation : {{ $recette->temps_preparation }} minutes<br>
                Coût : {{ $recette->cout }}<br>
                <img src="{{ Vite::asset('resources/images/' . $recette->nom . '.jpg') }}" alt="Image de {{ $recette->nom }}" style="width: 100px; height: 100px;">

                <div>
                    <a href="{{ route('recettes.show', $recette) }}">Détails</a> |
                    <a href="{{ route('recettes.edit', $recette) }}">Modifier</a> |
                    <form action="{{ route('recettes.destroy', $recette) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">Supprimer</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-app>
