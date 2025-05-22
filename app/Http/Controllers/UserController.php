<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  /**
   * Show the profile for a given user.
   */
  public function show(): View
  {
    $restaurant = Restaurant::select('id', 'localisation', 'nb_places', 'image')
      ->where('user_id', '=', Auth::id())
      ->first();
    if (!$restaurant) {
      return view('user.profile', [
        'user' => Auth::user()
      ]);
    } else {
      $types = Type::select('name')
        ->join('restaurant_types', 'restaurant_types.type_id', 'types.id')
        ->where('restaurant_id', '=', $restaurant->id)
        ->get();
      return view('restaurants.profile', [
        'user' => Auth::user(),
        'restaurant' => $restaurant,
        'types' => $types
      ]);
    }

  }
}
