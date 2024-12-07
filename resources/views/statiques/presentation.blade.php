<x-app :titre="$titre">
    <style>
        .presentation-page {
            text-align: center;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .presentation-page h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .presentation-page h2 {
            font-size: 1.8rem;
            color: #555;
            margin-bottom: 15px;
        }

        .presentation-page p {
            font-size: 1.2rem;
            color: #777;
            margin-bottom: 30px;
        }
    </style>

    <div class="presentation-page">
        <h1>{{ $titre }}</h1>
        <h2>Présentation de l'application</h2>
        <p>Cette application vous permet de découvrir des recettes de cuisine variées et délicieuses.</p>
    </div>
</x-app>
