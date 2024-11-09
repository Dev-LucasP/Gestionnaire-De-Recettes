<<<<<<< HEAD
<x-app :titre="$titre">
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des Recettes</title>
    </head>
    <body>
    <h1>Liste des Recettes</h1>

    <ul>
        @foreach ($recettes as $recette)
            <li>
                <strong>{{ $recette->nom }}</strong><br>
                Description : {{ $recette->description }}<br>
                Catégorie : {{ $recette->categorie }}<br>
                Nombre de personnes : {{ $recette->nb_personnes }}<br>
                Temps de préparation : {{ $recette->temps_preparation }} minutes<br>
                Coût : {{ $recette->cout }}<br>
                <img src="{{ $recette->visuel }}" alt="Image de {{ $recette->nom }}" style="width: 100px; height: 100px;">
            </li>
        @endforeach
    </ul>
    </body>
    </html>
</x-app>
=======
<x-app-layout>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Liste des recettes</title>
</head>
<body>
<h2>La liste des recettes</h2>

@if(!empty($recettes))
    <ul>
        @foreach($recettes as $recette)
            <li>
                {{$recette->nom}} {{$recette->description}} {{$recette->categorie}} {{$recette->visuel}} {{$recette->temps_preparation}} {{$recette->nb_personnes}} {{$recette->cout}}
            </li>
        @endforeach
    </ul>
@else
    <h3>aucune recette</h3>
@endif
</body>
</html>
</x-app-layout>
>>>>>>> origin/bug-affichage-recette
