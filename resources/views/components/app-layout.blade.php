<!doctype html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app-layout.css')}}">
    <title>{{$titre ?? "Gestion des tâches"}}</title>
</head>
<body>

<x-menu></x-menu>

<main>
    {{$slot}}
</main>

<aside>
    <x-aside></x-aside>
</aside>
<footer>
    <x-footer></x-footer>
</footer>
</body>
</html>
