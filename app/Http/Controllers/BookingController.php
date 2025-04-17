<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Restaurant;
use Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::
        where('user_id',Auth::id())
        ->join('restaurants', 'bookings.restaurant_id', '=', 'restaurants.id')
        ->get();
        
        return view('booking.index', [
            'bookings' => $bookings
        ]);
    }
}
