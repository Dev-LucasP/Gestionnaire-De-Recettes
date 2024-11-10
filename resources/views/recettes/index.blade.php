<x-app :titre="$titre">
    <h1>Liste des Recettes</h1>

    <h4>Filtrage par catégorie</h4>
    <form action="{{ route('recettes.index') }}" method="get">
        <select name="cat">
            <option value="All" @if($cat == 'All') selected @endif>-- Toutes catégories --</option>
            @foreach($categories as $categorie)
                <option value="{{ $categorie }}" @selected($cat == $categorie)>{{ $categorie }}</option>
            @endforeach
        </select>
        <input type="submit" value="OK">
    </form>

    <h2>Recettes</h2>
    <ul>
        @foreach ($recettes as $recette)
            <li>
                <strong>{{ $recette->nom }}</strong><br>
                Description : {{ $recette->description }}<br>
                Catégorie : {{ $recette->categorie }}<br>
                Nombre de personnes : {{ $recette->nb_personnes }}<br>
                Temps de préparation : {{ $recette->temps_preparation }} minutes<br>
                Coût : {{ $recette->cout }}<br>
                <img src="{{ $recette->visuel }}" alt="Image de {{ $recette->nom }}" style="width: 100px; height: 100px;">

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
