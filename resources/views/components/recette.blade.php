@props(['recette'])

<div class="recette">
    <li>
        <strong>{{ $recette->nom }}</strong><br>
        Description : {{ $recette->description }}<br>
        Catégorie : {{ $recette->categorie }}<br>
        Nombre de personnes : {{ $recette->nb_personnes }}<br>
        Temps de préparation : {{ $recette->temps_preparation }} minutes<br>
        Coût : {{ $recette->cout }}<br>
        ID d'utilisateur : {{ $recette->user_id }}<br>
        <strong>Ingrédients :</strong>
        <ul class="ingredients">
            @foreach ($recette->ingredients as $ingredient)
                <x-ingredient :ingredient="$ingredient" />
            @endforeach
        </ul>
        <img src="{{ Vite::asset('public/storage/' . $recette->visuel) }}" alt="Image de {{ $recette->nom }}" style="width: 100px; height: 100px;">

        <a href="{{ route('recettes.show', $recette->id) }}" class="btn btn-info">Voir les détails</a>

        @can('update', $recette)
            <a href="{{ route('recettes.edit', $recette->id) }}" class="btn btn-primary">Modifier</a>
        @endcan

        @can('delete', $recette)
            <form action="{{ route('recettes.destroy', $recette->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        @endcan
    </li>
</div>
