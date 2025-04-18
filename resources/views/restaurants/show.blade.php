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
  <div class="bg-white">
    <div
      class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
      <div>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $restaurant->name }}</h2>
        <p class="mt-4 text-gray-500">The walnut wood card tray is precision milled to perfectly fit a stack of Focus
          cards. The powder coated steel divider separates active cards from new ones, or can be used to archive
          important task lists.</p>

        <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Origin</dt>
            <dd class="mt-2 text-sm text-gray-500">Designed by Good Goods, Inc.</dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Material</dt>
            <dd class="mt-2 text-sm text-gray-500">Solid walnut base with rare earth magnets and powder coated steel
              card cover
            </dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Dimensions</dt>
            <dd class="mt-2 text-sm text-gray-500">6.25&quot; x 3.55&quot; x 1.15&quot;</dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Finish</dt>
            <dd class="mt-2 text-sm text-gray-500">Hand sanded and finished with natural oil</dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Includes</dt>
            <dd class="mt-2 text-sm text-gray-500">Wood card tray and 3 refill packs</dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Considerations</dt>
            <dd class="mt-2 text-sm text-gray-500">Made from natural materials. Grain and color vary with each item.
            </dd>
          </div>
        </dl>
      </div>
      <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
        <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-feature-03-detail-01.jpg"
             alt="Walnut card tray with white powder coated steel divider and 3 punchout holes."
             class="rounded-lg bg-gray-100">
        <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-feature-03-detail-02.jpg"
             alt="Top down view of walnut card tray with embedded magnets and card groove."
             class="rounded-lg bg-gray-100">
        <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-feature-03-detail-03.jpg"
             alt="Side of walnut card tray with card groove and recessed card area." class="rounded-lg bg-gray-100">
        <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-feature-03-detail-04.jpg"
             alt="Walnut card tray filled with cards and card angled in dedicated groove."
             class="rounded-lg bg-gray-100">
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($dishes as $dish)
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
        <!-- Image du plat -->
        <div class="relative h-48 overflow-hidden">
          <img
            src="{{ $dish->image_url ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80' }}"
            alt="{{ $dish->name }}"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
          >
        </div>

        <!-- Contenu -->
        <div class="p-4 flex-grow flex flex-col">
          <!-- Nom -->
          <div class="flex justify-between items-start mb-2">
            <h3 class="text-lg font-semibold text-gray-900">{{ $dish->name }}</h3>
          </div>

          <!-- Description -->
          <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-grow">{{ $dish->description }}</p>

          <!-- Bouton d'ajout -->
          <form action="{{ route('cart.add', $dish->id) }}" method="POST">
            @csrf
            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
            <button
              type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition flex items-center justify-center"
            >
              <i class="fas fa-shopping-cart mr-2"></i> Ajouter
            </button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
@endsection
</body>
</html>
