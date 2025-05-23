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

      $newRestaurants = Restaurant::orderBy('created_at', 'desc')->take(3)->get();

      return view('home', [
        'filters' => $filters,
        'newRestaurants' => $newRestaurants
      ]);
    }
}
