<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
@extends('layouts.app')

@section('title', $restaurant->name)

@section('content')
  <div class="bg-white border-b-3 border-gray-200 mb-5">
    <div
      class="mx-auto grid max-w-2xl grid-cols-1 items-center px-4 py-10 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
      <img class="rounded-xl w-full h-48 object-cover mb-10" src="{{ $restaurant->image }}"
           alt="{{ $restaurant->name }}"/>
      <div>
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $restaurant->name }}</h1>
        <div class="flex items-center gap-2">
          <svg class="flex-none" xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 448 512">
            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
            <path
              d="M416 0C400 0 288 32 288 176l0 112c0 35.3 28.7 64 64 64l32 0 0 128c0 17.7 14.3 32 32 32s32-14.3 32-32l0-128 0-112 0-208c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7L80 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224.4c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16l0 134.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8L64 16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z"/>
          </svg>
          <p class="text-gray-500">
            type(s) :
            @foreach ($types as $type)
              <span
                class="bg-black-600 text-black-800 text-xs font-medium me-2 px-3.5 py-0.5 rounded-full dark:bg-gray-300 dark:text-gray-600">
                  {{ $type->name }}
              </span>
            @endforeach
          </p>
        </div>
        <div class="flex items-center gap-2">
          <svg class="flex-none" xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 384 512">
            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
            <path
              d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/>
          </svg>
          <p class="text-gray-500 flex-initial">{{ $restaurant->localisation }}</p>
        </div>
        <div class="flex items-center gap-2">
          <svg class="flex-none" xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 576 512">
            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
            <path
              d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
          </svg>
          @if ($restaurant->note)
            <p class=" text-gray-500 flex-initial">{{ $restaurant->note }}/5</p>
          @else
            <p class="text-gray-500 flex-initial">aucune note</p>
          @endif
        </div>
        <div class="flex items-center gap-2">
          <svg class="flex-none" xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 448 512">
            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
            <path
              d="M248 48l0 208 48 0 0-197.3c23.9 13.8 40 39.7 40 69.3l0 128 48 0 0-128C384 57.3 326.7 0 256 0L192 0C121.3 0 64 57.3 64 128l0 128 48 0 0-128c0-29.6 16.1-55.5 40-69.3L152 256l48 0 0-208 48 0zM48 288c-12.1 0-23.2 6.8-28.6 17.7l-16 32c-5 9.9-4.4 21.7 1.4 31.1S20.9 384 32 384l0 96c0 17.7 14.3 32 32 32s32-14.3 32-32l0-96 256 0 0 96c0 17.7 14.3 32 32 32s32-14.3 32-32l0-96c11.1 0 21.4-5.7 27.2-15.2s6.4-21.2 1.4-31.1l-16-32C423.2 294.8 412.1 288 400 288L48 288z"/>
          </svg>
          <p class=" text-gray-500 flex-initial">il reste {{ $restaurant->nb_places ?? "aucune" }} place.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="flex flex-col px-5">
    @foreach($dishes as $dish)
      <div class="bg-white overflow-hidden flex flex-row justify-between h-full border-b border-b-gray-200 items-center py-5 last-of-type:border-0">
        <!-- Contenu -->
        <div class="flex flex-col gap-5">
          <h2>{{ $dish->name }}</h2>
          <div class="flex flex-center gap-4">
            <p class="text-xs">Prix : {{ $dish->price }}</p>
            <p class="text-xs">Taille : {{ $dish->size }}</p>
          </div>
        </div>
        <!-- Image -->
        <div class="relative">
          <img class="rounded-xl h-40 z-0"
               src="{{ $dish->image ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80' }}"
               alt="">
          <!-- Bouton d'ajout -->
          <form action="{{ route('cart.add', $dish->id) }}" method="POST">
            @csrf
            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
            <button
              type="submit"
              class="absolute top-0 right-0 z-10 -translate-x-1 translate-y-1 cursor-pointer w-10 h-10 bg-gray-700 text-white p-2 rounded-full transition flex items-center justify-center"
            >
              <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><title>
                  shopping_cart_1_line</title>
                <g id="shopping_cart_1_line" fill='none' fill-rule='evenodd'>
                  <path
                    d='M24 0v24H0V0zM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01z'/>
                  <path fill='#ffffff'
                        d='M7.5 19a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3m10 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3M3.138 2A3 3 0 0 1 6.13 4.786L6.145 5h13.657a2 2 0 0 1 1.968 2.358l-1.637 9A2 2 0 0 1 18.165 18H6.931a2 2 0 0 1-1.995-1.858l-.8-11.213A1 1 0 0 0 3.137 4H3a1 1 0 0 1 0-2zm16.664 5H6.288l.643 9h11.234z'/>
                </g>
              </svg>
            </button>
          </form>
        </div>
      </div>
  @endforeach
  </div>
  <div class="border-t-4 border-gray-200">

  </div>
@endsection
</body>
</html>
