<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
  public function show(): View
  {
    $user = Auth::user();
    $bookings = (new BookingController())->index();

    $restaurant = Restaurant::select('id', 'localisation', 'nb_places', 'image')
      ->where('user_id', $user->id)
      ->first();

    if (!$restaurant) {
      return view('user.profile', [
        'user' => $user,
        'bookings' => $bookings,
      ]);
    }

    $types = Type::select('name')
      ->join('restaurant_types', 'restaurant_types.type_id', 'types.id')
      ->where('restaurant_id', $restaurant->id)
      ->get();

    return view('restaurants.profile', [
      'user' => $user,
      'restaurant' => $restaurant,
      'types' => $types,
      'bookings' => $bookings,
    ]);
  }
}
