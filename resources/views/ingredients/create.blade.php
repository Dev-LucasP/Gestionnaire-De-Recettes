<x-app :titre="$titre">
    <div class="create-recette">

        <h1>Créer un nouveau Ingrédient</h1>

        <form action="{{ route('ingredients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nom">Nom de l'ingrédient :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <button type="submit">Créer l'ingrédient</button>
        </form>
    </div>
</x-app>
