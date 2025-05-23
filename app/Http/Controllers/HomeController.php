<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
      $filters = Type::select('name', 'id')->get();

      $restaurantController = new RestaurantController();
      $newRestaurants = $restaurantController->getNews();
      $favorites = $restaurantController->getFavorites();

      return view('home', [
        'filters' => $filters,
        'newRestaurants' => $newRestaurants,
        'favorites' => $favorites
      ]);
    }
}
