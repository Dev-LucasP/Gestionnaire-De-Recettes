<x-app :titre="'Créer une nouvelle recette'">
    <h1>Créer une nouvelle recette</h1>

    <!-- Formulaire pour créer une nouvelle recette -->
    <form action="{{ route('recettes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <!-- Champ pour le nom de la recette -->
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <!-- Zone de texte pour la description de la recette -->
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <!-- Champ pour la catégorie de la recette -->
            <label for="categorie">Catégorie :</label>
            <input type="text" id="categorie" name="categorie" required>
        </div>
        <div>
            <!-- Champ pour le nombre de personnes que la recette sert -->
            <label for="nb_personnes">Nombre de personnes :</label>
            <input type="number" id="nb_personnes" name="nb_personnes" required>
        </div>
        <div>
            <!-- Champ pour le temps de préparation en minutes -->
            <label for="temps_preparation">Temps de préparation (minutes) :</label>
            <input type="number" id="temps_preparation" name="temps_preparation" required>
        </div>
        <div>
            <!-- Champ pour le coût de la recette -->
            <label for="cout">Coût :</label>
            <input type="text" id="cout" name="cout" required>
        </div>
        <!-- Bouton pour soumettre le formulaire et créer la recette -->
        <button type="submit">Créer</button>
    </form>
</x-app>
