<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Titre par défaut')</title>
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <!-- CSS global -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @vite(['resources/js/app.js'])
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col py-5 md:py-0 md:items-center md:w-screen">

<!-- Header -->
<header>
  <!-- Navbar desktop visible à partir de md (>= 768px) -->
  <div class="hidden md:block mb-5">
    <x-navbar />
  </div>
</header>

<!-- Main content -->
<main class="flex flex-col flex-grow md:px-60 md:w-screen">
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
