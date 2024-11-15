<x-app :titre="$titre">
    <style>
        /* Style général pour la page de contact */
        .contact-page {
            text-align: center;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        /* Style pour le titre principal */
        .contact-page h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        /* Style pour le sous-titre de la section de contact */
        .contact-page h2 {
            font-size: 1.8rem;
            color: #555;
            margin-bottom: 15px;
        }

        /* Style pour le paragraphe d'instructions */
        .contact-page p {
            font-size: 1.2rem;
            color: #777;
            margin-bottom: 30px;
        }
    </style>

    <div class="contact-page">
        <!-- Titre principal de la page -->
        <h1>{{ $titre }}</h1>
        <!-- Sous-titre de la section de contact -->
        <h2>Contactez-nous</h2>
        <!-- Paragraphe d'instructions pour contacter via le formulaire -->
        <p>Vous pouvez nous envoyer un message via notre formulaire de contact.</p>
    </div>
</x-app>
