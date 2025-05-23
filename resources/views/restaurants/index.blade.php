<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookings</title>
</head>
<body>
@extends('layouts.app')

@section('title', 'Restaurants')

@section('content')
    <br>
  <x-inputs.search-input placeholder="Chercher un restaurant" action="{{ route('search-restaurants') }}" />
  <br>
  <form method="POST" action="{{ route('search-restaurants') }}">
    @csrf
    <div class="scroll-container bg-gray-100">
        @foreach ($filters as $filter)
            <x-inputs.slider-filter name="{{ $filter->name }}" id="{{ $filter->id }}"></x-inputs.slider-filter>
        @endforeach
    </div>
    <button type="submit" class="m-5 text-black bg-dinee hover:bg-dinee-secondary focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2"> Filtrer </button>
  </form>
    <ul role="list" class="divide-y divide-gray-100 mx-5">
      @foreach($restaurants as $restaurant)
        <div class="md:hidden w-full bg-white rounded-lg shadow p-4 mb-5">
          <a href="{{ route('restaurant', ['id' => $restaurant->id]) }}">
          <!-- Image simulée -->
          <div class="w-full scroll-n h-32 bg-gray-200 rounded-lg mb-4 bg-cover bg-center" style="background-image: url('{{ $restaurant->image ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80' }}');">
          <!-- Remplace bg-[url(...)] par une vraie image ou <img> si besoin -->
          </div>

          <!-- Titre -->
          <h3 class="text-lg font-medium text-gray-900">{{ $restaurant->name }}</h3>

          <!-- Note -->
          <div class="flex items-center text-sm text-gray-600">
            <!-- Icône étoile (ex: Heroicons ou FontAwesome) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.977 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.977-2.89a1 1 0 00-1.175 0l-3.977 2.89c-.784.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118l-3.977-2.89c-.783-.57-.38-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.518-4.674z"/>
            </svg>
            4,5
          </div>
          </a>
        </div>
        <li class="hidden md:block">
          <a class="flex justify-between gap-x-6 py-5" href="{{ route('restaurant', ['id' => $restaurant->id]) }}">
            <div class="flex min-w-0 gap-x-4">
              <img class="size-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              <div class="min-w-0 flex-auto">
                <p class="text-sm/6 font-semibold text-gray-900">{{ $restaurant->name }}</p>
              </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
              <p class="text-sm/6 text-gray-900">Nb de place: {{ $restaurant->available_seats }}</p>
            </div>
          </a>
        </li>
      @endforeach
    </ul>
@endsection
</body>
</html>
