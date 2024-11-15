<x-app :titre="$titre">
    <style>
        /* Style général pour la page de présentation */
        .presentation-page {
            text-align: center;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        /* Style pour le titre principal */
        .presentation-page h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        /* Style pour le sous-titre de la section de présentation */
        .presentation-page h2 {
            font-size: 1.8rem;
            color: #555;
            margin-bottom: 15px;
        }

        /* Style pour le paragraphe d'introduction */
        .presentation-page p {
            font-size: 1.2rem;
            color: #777;
            margin-bottom: 30px;
        }
    </style>

    <div class="presentation-page">
        <!-- Titre principal de la page -->
        <h1>{{ $titre }}</h1>
        <!-- Sous-titre de la section de présentation -->
        <h2>Présentation de l'application</h2>
        <!-- Paragraphe d'introduction à l'application -->
        <p>Cette application vous permet de découvrir des recettes de cuisine variées et délicieuses.</p>
    </div>
</x-app>
