<x-app :titre="$titre">
    <h1>Liste des Recettes</h1>

    <form action="{{ route('recettes.index') }}" method="get">
        <select name="cat">
            <option value="All" @if($cat == 'All') selected @endif>-- Toutes catégories --</option>
            @foreach($categories as $categorie)
                <option value="{{ $categorie }}" @selected($cat == $categorie)>{{ $categorie }}</option>
            @endforeach
        </select>
        <input type="submit" value="Filtrer">
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
                <img src="{{ Vite::asset('resources/images/' . $recette->nom . '.jpg') }}" alt="Image de {{ $recette->nom }}" style="width: 100px; height: 100px;">
            </li>
        @endforeach
    </ul>
</x-app>
