<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
    </head>
    <body>
    @extends('layouts.app')

    @section('title', 'Accueil')

    @section('content')

      <!-- Searchbar -->
      <x-inputs.search-input placeholder="Chercher un restaurant" action="{{ route('search-restaurants') }}" />

      <!-- Filter -->
      <form method="POST" action="{{ route('search-restaurants') }}">
        @csrf
        <div class="scroll-container bg-gray-100 my-5 no-scrollbar">
          @foreach ($filters as $filter)
            <x-inputs.slider-filter name="{{ $filter->name }}" id="{{ $filter->id }}"></x-inputs.slider-filter>
          @endforeach
        </div>
        <button type="submit" class="mx-5 text-black bg-dinee hover:bg-dinee-secondary focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2"> Filtrer </button>
      </form>

      <!-- New restaurants -->
      <div>
        <h2 class="text-xl text-dinee-secondary py-5 mx-5">Nouveautés</h2>
        <div class="flex gap-5 overflow-x-scroll px-5 pb-15 no-scrollbar">
          @foreach($newRestaurants as $newRestaurant)
            <div class="flex flex-col w-60 h-40 flex-shrink-0">
              <img class="w-full h-full object-cover rounded-xl shadow-md mb-2" src="{{ $newRestaurant->image }}" alt="{{ $newRestaurant->name }}">
              <h3>{{ $newRestaurant->name }}</h3>
              <p>Note (TODO)</p>
            </div>
          @endforeach
        </div>
      </div>

      <!-- Special offer -->
    @endsection
    </body>
</html>
