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
    @endsection
    </body>
</html>
