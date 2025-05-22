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

<iframe class=" h-screen w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5417.079200735489!2d-1.6223901881485732!3d47.24515087103868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805edd7372654af%3A0xcffa22bed8dc403a!2sMyDigitalSchool%20Nantes!5e0!3m2!1sfr!2sfr!4v1747922169525!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


@endsection
</body>
</html>