<x-app :titre="$titre">
    <div>
        <h1>{{ $titre }}</h1>
        <h2>Bienvenue sur l'application Les recettes de MamyLens</h2>
        <p>Explorez nos recettes pour découvrir de nouvelles saveurs !</p>
    </div>
    <img src="{{ Vite::asset('resources/images/logo.jpg') }}" alt="Logo" class="centered-image">
</x-app>
