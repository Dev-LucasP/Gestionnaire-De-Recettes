<x-app-layout :titre="$titre">
    <div>
        <h1>{{ $titre }}</h1>
        <h2>Gestion des tâches</h2>
        <p>Bienvenue dans l'application de gestion des tâches.</p>
        @vite(['resources/css/app.css'])
        <img src="{{ Vite::asset('resources/images/recette-img.jpg') }}" alt="Example Image" class="centered-image">
    </div>
</x-app-layout>
