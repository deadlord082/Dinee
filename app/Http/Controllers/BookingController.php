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
        select('status','dishes.name as dishe_name', 'dishes.image as dishe_img', 'bookings.name','date','bookings.nb_places','restaurants.name as restaurant_name', 'restaurants.image as restaurant_image')
        ->where('bookings.user_id',Auth::id())
        ->join('restaurants', 'bookings.restaurant_id',  'restaurants.id')
        ->join('statuts', 'bookings.statut_id',  'statuts.id')
        ->join('booking_dishes', 'bookings.id',  'booking_dishes.booking_id')
        ->join('dishes', 'booking_dishes.dishe_id',  'dishes.id')
        ->get();

        return $bookings;
    }
}
