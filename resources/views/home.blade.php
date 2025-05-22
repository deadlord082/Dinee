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
        Bienvenue
    @endsection
    </body>
</html>
