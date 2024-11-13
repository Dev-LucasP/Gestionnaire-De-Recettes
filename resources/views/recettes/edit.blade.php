<x-app :titre="'Modifier la Recette : ' . $recette->nom">
    <h1>Modifier la Recette</h1>

    <!-- Formulaire pour mettre à jour une recette existante -->
    <form action="{{ route('recettes.update', $recette) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Champ pour le nom de la recette -->
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom', $recette->nom) }}" required>

        <!-- Zone de texte pour la description de la recette -->
        <label for="description">Description :</label>
        <textarea name="description" id="description">{{ old('description', $recette->description) }}</textarea>

        <!-- Champ pour la catégorie de la recette -->
        <label for="categorie">Catégorie :</label>
        <input type="text" name="categorie" id="categorie" value="{{ old('categorie', $recette->categorie) }}">

        <!-- Champ pour le nombre de personnes que la recette sert -->
        <label for="nb_personnes">Nombre de personnes :</label>
        <input type="number" name="nb_personnes" id="nb_personnes" value="{{ old('nb_personnes', $recette->nb_personnes) }}">

        <!-- Champ pour le temps de préparation en minutes -->
        <label for="temps_preparation">Temps de préparation (minutes) :</label>
        <input type="number" name="temps_preparation" id="temps_preparation" value="{{ old('temps_preparation', $recette->temps_preparation) }}">

        <!-- Champ pour le coût de la recette -->
        <label for="cout">Coût :</label>
        <input type="text" name="cout" id="cout" value="{{ old('cout', $recette->cout) }}">

        <!-- Bouton pour soumettre le formulaire et enregistrer les modifications -->
        <button type="submit">Enregistrer les modifications</button>
    </form>
</x-app>
