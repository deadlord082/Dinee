<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Titre par défaut')</title>

  <!-- CSS global -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @vite(['resources/js/app.js'])
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col py-5">

<!-- Header -->
<header>
  <!-- Navbar desktop visible à partir de md (>= 768px) -->
  <div class="hidden md:block">
    <x-navbar />
  </div>
</header>

<!-- Main content -->
<main class="flex-grow">
  @yield('content')
</main>

<!-- Footer -->
<footer>
  <!-- Navbar mobile visible en dessous de md (< 768px) -->
  <div class="block md:hidden">
    <x-navbar-mobile />
  </div>
</footer>

</body>
</html>
