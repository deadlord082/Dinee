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
        <div class="scroll-container my-5 no-scrollbar flex gap-2">
          @foreach ($filters as $filter)
            <x-inputs.slider-filter name="{{ $filter->name }}" id="{{ $filter->id }}" image="{{ $filter->image }}"></x-inputs.slider-filter>
          @endforeach
        </div>

      <!-- New restaurants -->
      <div>
        <h2 class="text-xl text-dinee-secondary py-5 mx-5 md:mx-0">Nouveautés</h2>
        <div class="flex gap-5 overflow-x-scroll px-5 no-scrollbar md:px-0">
          @foreach($newRestaurants as $newRestaurant)
            <a href="{{ route('restaurant', ['id' => $newRestaurant->id]) }}">
            <div class="flex flex-col w-60 h-auto flex-shrink-0">
                <img class="w-full h-40 object-cover rounded-xl shadow-md mb-2" src="{{ $newRestaurant->image }}" alt="{{ $newRestaurant->name }}">
                <h3 class="truncate">{{ $newRestaurant->name }}</h3>
                <p class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.977 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.977-2.89a1 1 0 00-1.175 0l-3.977 2.89c-.784.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118l-3.977-2.89c-.783-.57-.38-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.518-4.674z"/>
                  </svg>
                  {{ $newRestaurant->note }}
                </p>
            </div>
            </a>
          @endforeach
        </div>
      </div>

      <!-- Special offer -->
      <div class="bg-no-repeat max-w-200 bg-cover relative mx-5 md:mx-0 my-10 h-60 rounded-xl p-5 shadow-md items-start flex flex-col justify-between bg-center bg-[url('https://imgs.search.brave.com/vFmSoeJGCFFy5e7KZr05-17DAn9DXHbbjNJ_weyiIgA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vUGJOZkdq/Z0dEM0hvY2NzQ2hM/X2JBNjFWRURCUmZV/N3FXVFprVXJvNlRJ/RS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzVwYzNS/dlkydHdhRzkwL2J5/NWpiMjB2YVdRdk1U/SXkvTVRJd09URTNN/Qzl3YUc5MC9ieTlp/ZFhKblpYSXRZVzVr/L0xXSmxaWEl0YUdG/dFluVnkvWjJWeUxY/ZHBkR2d0WW1WbC9a/aTFqYUdWbGMyVXRi/MjVwL2IyNHRkRzl0/WVhSdkxXRnUvWkMx/bmNtVmxiaTF6WVd4/aC9aQzFoTFhOcFpH/VXRkbWxsL2R5MXZi/aTFoTFdSaGNtc3Uv/YW5CblAzTTlOakV5/ZURZeC9NaVozUFRB/bWF6MHlNQ1pqL1BX/RTBRVTlwTjJZdGRq/SksvT1dSb1NVY3Ra/Rk5VZVZRdC9NVE50/VkhVM2MxWm1jazh3/L2MwRjBWRUZWTVRn/OQ')]">
        <h4 class="text-xl text-white text-shadow">Offres spéciales !</h4>
        <p class="text-white text-shadow">Late night... <br /><i class="text-xs">Jusqu'au 15 juin</i></p>
        <button class="bg-white p-2 rounded-3xl text-xs shadow-md">
          Découvrez les offres
        </button>
      </div>

      <!-- Favorites -->
      <div>
        <h2 class="text-xl text-dinee-secondary mx-5 md:mx-0 pb-5">Les favoris du public</h2>
        <div class="flex gap-5 overflow-x-scroll px-5 md:px-0 pb-15 no-scrollbar">
          @foreach($favorites as $favorite)
            <div class="flex flex-col w-60 h-auto flex-shrink-0">
              <img class="w-full h-40 object-cover rounded-xl shadow-md mb-2" src="{{ $favorite->image }}" alt="{{ $favorite->name }}">
              <h3 class="truncate">{{ $favorite->name }}</h3>
              <p class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.977 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.977-2.89a1 1 0 00-1.175 0l-3.977 2.89c-.784.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118l-3.977-2.89c-.783-.57-.38-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.518-4.674z"/>
                </svg>
                {{ $favorite->note }}
              </p>
            </div>
          @endforeach
        </div>
      </div>
    @endsection
    </body>
</html>
