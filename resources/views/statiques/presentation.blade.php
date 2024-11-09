<<<<<<< HEAD
<x-app :titre="$titre">
    <div>
        <h1>{{ $titre }}</h1>
        <h2>Présentation de l'application</h2>
        <p>Cette application vous permet de découvrir des recettes de cuisine variées et délicieuses.</p>
    </div>
</x-app>
=======

<!-- resources/views/presentation.blade.php -->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation de l'application</title>
    <link rel="stylesheet" href="{{ asset('css/app-layout.css') }}">
</head>
<body>
    <x-app-layout>
        <main>
            <h1>Bienvenue sur notre application</h1>
            <p>Cette application est conçue pour vous aider à gérer vos tâches et recettes de manière efficace.</p>
            <section>
                <h2>Fonctionnalités</h2>
                <ul>
                    <li>Gestion des tâches</li>
                    <li>Suivi des recettes</li>
                    <li>Interface utilisateur intuitive</li>
                </ul>
            </section>
            <section>
                <h2>À propos de nous</h2>
                <p>Nous sommes une équipe dédiée à fournir les meilleures solutions pour la gestion quotidienne.</p>
            </section>
        </main>
    </x-app-layout>
</body>
</html>
>>>>>>> origin/bug-affichage-recette
