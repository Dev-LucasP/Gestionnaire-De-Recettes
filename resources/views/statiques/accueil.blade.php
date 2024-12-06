<x-app :titre="$titre">
    <div class="page-content">
        <h1>{{ $titre }}</h1>
        <h2>Bienvenue sur l'application Les recettes de MamyLens</h2>
        <p>Explorez nos recettes pour découvrir de nouvelles saveurs !</p>
    </div>
    <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo" class="centered-image">
</x-app>
