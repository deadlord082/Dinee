<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bookings</title>
    </head>
    <body>
        <x-navbar></x-navbar>
        <table>
            <tr>
                <th>restaurant</th>
                <th>plat</th>
                <th>statut</th>
                <th>nom de la reservation</th>
                <th>nb_places</th>
            </tr>
            <tr>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->restaurant_name }}</td>
                    <td>{{ $booking->dishe_name }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->nb_places }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>