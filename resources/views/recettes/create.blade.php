<x-app :titre="'Créer une nouvelle recette'">
    <h1>Créer une nouvelle recette</h1>

    <form action="{{ route('recettes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="categorie">Catégorie :</label>
            <input type="text" id="categorie" name="categorie" required>
        </div>
        <div>
            <label for="nb_personnes">Nombre de personnes :</label>
            <input type="number" id="nb_personnes" name="nb_personnes" required>
        </div>
        <div>
            <label for="temps_preparation">Temps de préparation (minutes) :</label>
            <input type="number" id="temps_preparation" name="temps_preparation" required>
        </div>
        <div>
            <label for="cout">Coût :</label>
            <input type="text" id="cout" name="cout" required>
        </div>
        <button type="submit">Créer</button>
    </form>
</x-app>
