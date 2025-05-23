<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>

    </head>
    <body>
    @extends('layouts.app')

    @section('title', 'Profile')

    @section('content')
    <a href="{{ route('settings') }}" class="absolute top-5 right-5 h-16"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg></a>
    <br>
    <div class="flex flex-col items-center justify-center px-4 py-5 sm:px-6 gap-3">
        <img class="w-50 h-50 rounded-full" src="{{ $user->image ?? 'https://imgs.search.brave.com/mDztPWayQWWrIPAy2Hm_FNfDjDVgayj73RTnUIZ15L0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzAyLzE1Lzg0LzQz/LzM2MF9GXzIxNTg0/NDMyNV90dFg5WWlJ/SXllYVI3TmU2RWFM/TGpNQW15NEd2UEM2/OS5qcGc'}}" alt="Rounded avatar">
        <h1 class="text-lg leading-6 font-medium text-gray-900">
          {{ $user->name }}
        </h1>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
      <h2 class="mb-10 text-xl">Historique de réservation</h2>
      @foreach($bookings as $booking)
        <div class="flex items-center gap-5 mb-5">
          <img class="size-20 flex-none rounded-full bg-gray-50" src="{{ $booking->restaurant_image ?? 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'}}" alt="">
          <div class="flex flex-col">
            <p>{{ $booking->restaurant_name }}</p>
            <p class="text-sm">{{ $booking->date }}</p>
          </div>
        </div>
        <div class="mb-10 flex flex-col gap-2 border-b border-b-gray-200 pb-10">
          <img class="size-15 flex-none rounded-lg bg-gray-50" src="{{ $booking->dishe_img ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80'}}" alt="">
          <p class="text-sm">{{ $booking->dishe_name }}</p>
        </div>
      @endforeach
      <dl class="sm:divide-y sm:divide-gray-200">
          <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                  Se déconnecter
              </a>
              </dd>
          </div>
      </dl>
    </div>

    <div class="px-4 py-5 sm:px-6">
        @if ($user->image)
        <img class="w-50 h-50 rounded-full" src="{{ $user->image }}" alt="Rounded avatar">
        @else
        <svg xmlns='http://www.w3.org/2000/svg' width='240' height='240' viewBox='0 0 24 24'><g id="user_4_line" fill='none' fill-rule='evenodd'><path d='M24 0v24H0V0zM12.594 23.258l-.012.002-.071.035-.02.004-.014-.004-.071-.036c-.01-.003-.019 0-.024.006l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113-.014.002-.184.093-.01.01-.003.011.018.43.005.012.008.008.201.092c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.003-.011.018-.43-.003-.012-.01-.01z'/><path fill='#09244BFF' d='M12 2c5.523 0 10 4.477 10 10a9.959 9.959 0 0 1-2.258 6.33l.02.022-.132.112A9.978 9.978 0 0 1 12 22c-2.95 0-5.6-1.277-7.43-3.307l-.2-.23-.132-.11.02-.024A9.958 9.958 0 0 1 2 12C2 6.477 6.477 2 12 2m0 15c-1.86 0-3.541.592-4.793 1.406A7.965 7.965 0 0 0 12 20a7.965 7.965 0 0 0 4.793-1.594A8.897 8.897 0 0 0 12 17m0-13a8 8 0 0 0-6.258 12.984C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984A8 8 0 0 0 12 4m0 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8m0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4'/></g></svg>
        @endif
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Profile Restaurant
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            informations sur votre compte restaurant
        </p>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
        <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    nom complet
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $user->name }}
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Addresse email
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $user->email }}
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Téléphone
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    ex : (123) 456-7890(à changer)
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Image
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                @if ($restaurant->image)
                <img class="w-50 h-50 rounded-full" src="{{ $restaurant->image }}" alt="Rounded avatar">
                @else
                <svg xmlns='http://www.w3.org/2000/svg' width='240' height='240' viewBox='0 0 24 24'><title>dish_cover_fill</title><g id="dish_cover_fill" fill='none' fill-rule='evenodd'><path d='M24 0v24H0V0zM12.594 23.258l-.012.002-.071.035-.02.004-.014-.004-.071-.036c-.01-.003-.019 0-.024.006l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113-.014.002-.184.093-.01.01-.003.011.018.43.005.012.008.008.201.092c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.003-.011.018-.43-.003-.012-.01-.01z'/><path fill='#09244BFF' d='M9 4a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2h-1v1.035c5.44.49 9.01 6.132 6.929 11.336A1 1 0 0 1 19 18H5a1 1 0 0 1-.928-.629C1.99 12.167 5.56 6.525 11 6.035V5h-1a1 1 0 0 1-1-1M3 20a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1'/></g></svg>
                @endif
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Localisation
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $restaurant->localisation }}
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Nombres de places
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $restaurant->nb_places }}
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    type de restaurant
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    @foreach ($types as $type)
                        <span class="bg-black-600 text-black-800 text-xs font-medium me-2 px-3.5 py-0.5 rounded-full dark:bg-gray-300 dark:text-gray-600">
                            {{ $type->name }}
                        </span>
                    @endforeach
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                    Se déconnecter
                </a>
                </dd>
            </div>
        </dl>
    </div>
    @endsection
    </body>
</html>
