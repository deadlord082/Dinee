<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Titre par défaut')</title>

    <!-- CSS global -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/js/app.js'])
</head>
<body>

<!-- Header, navbar ou autre -->
<header>
    <x-navbar></x-navbar>
</header>

<!-- Contenu injecté ici -->
<main>
    @yield('content')
</main>
</body>
</html>

