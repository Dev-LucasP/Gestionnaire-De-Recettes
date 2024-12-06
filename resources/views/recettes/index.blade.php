<!-- resources/views/recettes/index.blade.php -->
<x-app :titre="$titre">
    <div class="index-recette">
        <h1>Liste des Recettes</h1>

        <!-- Formulaire pour filtrer les recettes par catégorie -->
        <form action="{{ route('recettes.index') }}" method="get">
            <select name="cat">
                <option value="All" @if($cat == 'All') selected @endif>-- Toutes catégories --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie }}" @if($cat == $categorie) selected @endif>{{ $categorie }}</option>
                @endforeach
            </select>
            <input type="submit" value="OK">
        </form>

        <ul>
            <div class="recette-container">
                @foreach ($recettes as $recette)
                    <x-recette :recette="$recette" />
                @endforeach
            </div>
        </ul>

        <!-- Lien pour créer une nouvelle recette -->
        <a href="{{ route('recettes.create') }}" class="btn btn-success">Créer une nouvelle recette</a>
    </div>
</x-app>
