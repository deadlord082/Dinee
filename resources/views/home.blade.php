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
        <?php $filters = ['Mexicain','Algérien','Italien','Truc'] ?>
        Bienvenue
        <x-inputs.search-input placeholder="Chercher un restaurant"></x-inputs.search-input>
        <br>
        <ul class="grid w-full gap-6 md:grid-cols-6">
            @foreach ($filters as $filter)
                <x-inputs.slider-filter name="{{ $filter }}"></x-inputs.slider-filter>
            @endforeach
        </ul>
    @endsection
    </body>
</html>
