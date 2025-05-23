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

<iframe class="h-screen w-full" src="https://www.google.com/maps/embed?pb=test" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d21668.3167501907!2d-1.61981!3d47.245151!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805edd7372654af%3A0xcffa22bed8dc403a!2sMyDigitalSchool%20Nantes!5e0!3m2!1sfr!2sfr!4v1747983667768!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2709.3795643998587!2d-1.630513588444898!3d47.228720971037326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805ecc3914960bf%3A0x182a00d2a680f5ae!2sZ%C3%A9nith%20Nantes%20M%C3%A9tropole!5e0!3m2!1sfr!2sfr!4v1747983728834!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
@endsection
</body>
</html>