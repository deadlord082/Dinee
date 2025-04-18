<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        $filters = Type::select('name','id')->get();

        return view('restaurants.index', [
            'restaurants' => $restaurants,
            'filters' => $filters
        ]);
    }

    public function search(Request $request)
    {

        $search = $request->search ?? '';
        $filters = $request->filters ?? '';

        $restaurants = Restaurant::where('name' ,'LIKE' ,'%'.$search.'%')->get();
        $filters = Type::select('name','id')->get();

        return view('restaurants.index', [
            'restaurants' => $restaurants,
            'filters' => $filters
        ]);
    }

  public function indexWithAvailableSeats()
  {
    $restaurants = Restaurant::select([
      'restaurants.id',
      'restaurants.name',
      'restaurants.localisation',
      'restaurants.nb_places',
      'restaurants.type_id',
      \DB::raw('(restaurants.nb_places - IFNULL((
            SELECT COUNT(*)
            FROM dishes
            WHERE dishes.restaurant_id = restaurants.id
            GROUP BY dishes.restaurant_id
        ), 0)) AS available_seats')
    ])
      ->get();

    return view('restaurants.index', [
      'restaurants' => $restaurants
    ]);
  }

  public function show($id)
  {
    $restaurant = Restaurant::select([
      'restaurants.id',
      'restaurants.name',
      'restaurants.localisation',
      'restaurants.nb_places',
      'restaurants.type_id',
    ])
      ->where('restaurants.id', $id)
      ->first();

    return view('restaurants.show', [
      'restaurant' => $restaurant
    ]);
  }
}
