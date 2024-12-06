<!-- resources/views/components/ingredient.blade.php -->
@props(['ingredient'])

<div class="ingredient">
    <li>{{ $ingredient->nom }}
        ({{ $ingredient->compose->quantite }})
    </li>
</div>
