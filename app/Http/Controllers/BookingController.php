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
        select('status','dishes.name as dishe_name','bookings.name','date','bookings.nb_places','restaurants.name as restaurant_name')
        ->where('user_id',Auth::id())
        ->join('restaurants', 'bookings.restaurant_id',  'restaurants.id')
        ->join('statuts', 'bookings.statut_id',  'statuts.id')
        ->join('dishes', 'bookings.dishe_id',  'dishes.id')
        ->get();
        
        return view('booking.index', [
            'bookings' => $bookings
        ]);
    }
}
