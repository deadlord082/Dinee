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
        <p>{{ $user->name }}</p>
        <a href="{{ route('logout') }}">Se déconnecter</a>
    @endsection
    </body>
</html>
