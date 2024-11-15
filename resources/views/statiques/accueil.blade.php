<x-app :titre="$titre">
    <style>
        /* Style général pour la page */
        .page-content {
            text-align: center;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        /* Style pour le titre principal */
        .page-content h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        /* Style pour le sous-titre de bienvenue */
        .page-content h2 {
            font-size: 1.8rem;
            color: #555;
            margin-bottom: 15px;
        }

        /* Style pour le paragraphe d'introduction */
        .page-content p {
            font-size: 1.2rem;
            color: #777;
            margin-bottom: 30px;
        }

        /* Style pour l'image du logo centrée */
        .centered-image {
            display: block;
            margin: 0 auto;
            width: 150px; /* Ajustez la taille selon vos besoins */
            height: auto;
        }
    </style>

    <div class="page-content">
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
