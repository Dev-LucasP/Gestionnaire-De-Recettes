<x-app :titre="$titre">
    <div class="create-recette">

        <h1>Créer une Nouvelle Recette</h1>

        <form action="{{ route('recettes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nom">Nom de la recette :</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="categorie">Catégorie :</label>
                <select id="categorie" name="categorie" required>
                    <option value="dessert">Dessert</option>
                    <option value="plat">Plat</option>
                    <option value="entrée">Entrée</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nb_personnes">Nombre de personnes :</label>
                <input type="number" id="nb_personnes" name="nb_personnes" min="1" required>
            </div>

            <div class="form-group">
                <label for="temps_preparation">Temps de préparation (minutes) :</label>
                <input type="number" id="temps_preparation" name="temps_preparation" min="1" required>
            </div>

            <div class="form-group">
                <label for="cout">Coût (€) :</label>
                <input type="number" id="cout" name="cout" step="0.01" min="0" required>
            </div>

            <div class="form-group">
                <label for="visuel">Visuel :</label>
                <input type="file" id="visuel" name="visuel" accept="image/*">
            </div>

            <fieldset style="border: 2px dashed cornflowerblue">
                <legend>Édition des ingrédients</legend>
                @foreach ($ingredients as $ingredient)
                    <div>
                        <input
                            type="checkbox"
                            name="ingredients[{{ $ingredient->id }}][id]"
                            value="{{ $ingredient->id }}"
                            id="ingredient-{{ $ingredient->id }}"
                            onchange="toggleQuantityInput(this)"
                        >
                        <label for="ingredient-{{ $ingredient->id }}">{{ $ingredient->nom }}</label>
                        <input
                            type="number"
                            name="ingredients[{{ $ingredient->id }}][quantite]"
                            min="1"
                            value="''"
                            placeholder="Quantité"
                            style="margin-left: 10px;"
                            disabled
                        >
                    </div>
                @endforeach
            </fieldset>

            <button type="submit">Créer la recette</button>
        </form>
    </div>

    <script>
        function toggleQuantityInput(checkbox) {
            const quantityInput = checkbox.nextElementSibling.nextElementSibling;
            quantityInput.disabled = !checkbox.checked;
        }
    </script>
</x-app>
