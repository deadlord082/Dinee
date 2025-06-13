<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>edit profile</title>
        @vite('resources/css/app.css')
    </head>
    <body>
    @extends('layouts.app')

    @section('title', 'Restaurants')

    @section('content')
    <x-inputs.go-back-input></x-inputs.go-back-input>
        <form method="POST" action="{{ route("settings.update-profil") }}">
        @csrf
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                 <img class="mx-auto h-30 w-auto" src="{{ $user->image }}" />
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <div>
                        <label for="image" class="block text-sm/6 font-medium text-gray-900">lien image</label>
                        <div class="mt-2">
                        <input type="text" value="{{ $user->image }}" name="image" id="image" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Nom</label>
                        <div class="mt-2">
                        <input type="text" value="{{ $user->name }}" name="name" id="name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Addresse email</label>
                        <div class="mt-2">
                        <input type="email" value="{{ $user->email }}" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">mot de passe</label>
                        </div>
                        <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                 <img class="mx-auto h-30 w-auto" src="{{ $restaurant->image }}" />
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <input type="text" hidden name="id" value="{{ $restaurant->id }}">
                    <div>
                        <label for="restaurant_image" class="block text-sm/6 font-medium text-gray-900">lien image restaurant</label>
                        <div class="mt-2">
                        <input type="text" value="{{ $restaurant->image }}" name="restaurant_image" id="restaurant_image" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="restaurant_name" class="block text-sm/6 font-medium text-gray-900">Nom Restaurant</label>
                        <div class="mt-2">
                        <input type="text" value="{{ $restaurant->name }}" name="restaurant_name" id="restaurant_name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div>
                        <label for="restaurant_localisation" class="block text-sm/6 font-medium text-gray-900">Localisation du restaurant</label>
                        <div class="mt-2">
                        <input type="text" value="{{ $restaurant->localisation }}" name="restaurant_localisation" id="restaurant_localisation" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div>
                        <label for="restaurant_nb_places" class="block text-sm/6 font-medium text-gray-900">Nombre de place du restaurant</label>
                        <div class="mt-2">
                        <input type="text" value="{{ $restaurant->nb_places }}" name="restaurant_nb_places" id="restaurant_nb_places" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div>
                        <label for="restaurant_nb_places" class="block text-sm/6 font-medium text-gray-900">Type(s) du restaurant</label>
                        <div class="mt-2">
                            @foreach ($types as $type)
                                <div class="flex items-center mb-4">
                                <input name="types[{{ $type->id }}][id]" hidden type="text" value="{{ $type->id }}" class="w-4 h-4">
                                <input id="default-checkbox" name="types[{{ $type->id }}][value]" id="{{ $type->name }}" type="checkbox" value="{{ $type->checked }}" class="w-4 h-4">
                                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900">{{ $type->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <button type="submit" class=" text-black bg-dinee hover:bg-dinee-secondary focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2"> Enregistrer </button>
                </div>
            </div>
        </form>
    @endsection
    </body>
</html>
