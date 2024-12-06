<x-app :titre="$titre">
    <div class="index-ingredient">
        <h1>Liste des Ingrédients</h1>

        <strong>Ingrédients :</strong>
        <ul class="ingredients">
            @foreach ($ingredients as $ingredient)
                <li> {{ $ingredient->nom }} </li>
            @endforeach
        </ul>

        <!-- Lien pour créer un nouvel ingrédient -->
        <a href="{{ route('ingredients.create') }}" class="btn btn-success">Créer un nouvel ingrédient</a>
    </div>
</x-app>
