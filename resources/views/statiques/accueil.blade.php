<<<<<<< HEAD
<x-app :titre="$titre">
    <div>
        <h1>{{ $titre }}</h1>
        <h2>Bienvenue sur l'application Les recettes de MamyLens</h2>
        <p>Explorez nos recettes pour découvrir de nouvelles saveurs !</p>
    </div>
    <img src="{{ Vite::asset('resources/images/logo.jpg') }}" alt="Logo" class="centered-image">
</x-app>
=======
<x-app-layout :titre="$titre">
    <div>
        <h1>{{ $titre }}</h1>
        <h2>Gestion des tâches</h2>
        <p>Bienvenue dans l'application de gestion des tâches.</p>
        @vite(['resources/css/app.css'])
        <img src="{{ Vite::asset('resources/images/recette-img.jpg') }}" alt="Example Image" class="centered-image">
    </div>
</x-app-layout>
>>>>>>> origin/bug-affichage-recette
