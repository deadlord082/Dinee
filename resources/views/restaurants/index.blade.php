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
    <button type="submit" class="text-white bg-dinee hover:bg-dinee-secondary focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2"> filtrer </button>
  </form>
    <ul role="list" class="divide-y divide-gray-100 mx-20">
      @foreach($restaurants as $restaurant)
        <li>
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
