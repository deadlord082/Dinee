<?php

namespace App\Http\Controllers;

use App\Models\Dishe;
use App\Models\Restaurant;
use App\Models\RestaurantType;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
      $restaurants = Restaurant::select([
        'restaurants.id',
        'restaurants.name',
        'restaurants.localisation',
        'restaurants.nb_places',
        \DB::raw('(restaurants.nb_places - IFNULL((
            SELECT COUNT(*)
            FROM dishes
            WHERE dishes.restaurant_id = restaurants.id
            GROUP BY dishes.restaurant_id
        ), 0)) AS available_seats')
    ])
      ->get();
    $filters = Type::select('name', 'id')->get();

    return view('restaurants.index', [
      'restaurants' => $restaurants,
      'filters' => $filters
    ]);
  }

  public function search(Request $request)
  {

    $search = $request->search ?? '';
    $filters = $request->filters ?? '';

    $restaurants = Restaurant::where('name', 'LIKE', '%' . $search . '%')->get();
    $filters = Type::select('name', 'id')->get();

    return view('restaurants.index', [
      'restaurants' => $restaurants,
      'filters' => $filters
    ]);
  }

  public function show($id)
  {
    $restaurant = Restaurant::select([
      'restaurants.id',
      'restaurants.name',
      'restaurants.localisation',
      'restaurants.nb_places',
    ])
      ->where('restaurants.id', $id)
      ->first();

    $types = Type::select('name')
        ->join('restaurant_types','restaurant_types.type_id','types.id')
        ->where('restaurant_id','=',$restaurant->id)
        ->get();

    $dishes = Dishe::select([
      'dishes.id',
      'dishes.name',
      'dishes.description',
      'dishes.image'
    ])
      ->where('restaurant_id', $id)
      ->get();

    return view('restaurants.show', [
      'restaurant' => $restaurant,
      'dishes' => $dishes,
      'types' => $types
    ]);
  }
}
