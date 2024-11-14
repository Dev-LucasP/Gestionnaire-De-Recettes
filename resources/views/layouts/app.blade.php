<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Les recettes de MamyLens')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <h1>Les recettes de MamyLens</h1>
</header>
<main>
    @yield('content')
</main>
</body>
</html>
