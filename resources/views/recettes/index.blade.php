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
