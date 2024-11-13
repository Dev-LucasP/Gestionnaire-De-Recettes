<x-app :titre="$titre">
    <div>
        <!-- Titre principal de la page -->
        <h1>{{ $titre }}</h1>
        <!-- Sous-titre de bienvenue -->
        <h2>Bienvenue sur l'application Les recettes de MamyLens</h2>
        <!-- Paragraphe d'introduction -->
        <p>Explorez nos recettes pour découvrir de nouvelles saveurs !</p>
    </div>
    <!-- Image du logo centrée -->
    <img src="{{ Vite::asset('resources/images/logo.jpg') }}" alt="Logo" class="centered-image">
</x-app>
