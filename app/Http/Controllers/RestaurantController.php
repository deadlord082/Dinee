<?php

namespace App\Http\Controllers;

use App\Models\Dishe;
use App\Models\Restaurant;
use App\Models\RestaurantType;
use App\Models\Review;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index($search = '', $filter = '')
    {
      $restaurants = Restaurant::select([
        'restaurants.id',
        'restaurants.name',
        'restaurants.localisation',
        'restaurants.nb_places',
        'restaurants.image',
        // \DB::raw('(restaurants.nb_places - IFNULL((
        //     SELECT *
        //     FROM dishes
        //     WHERE dishes.restaurant_id = restaurants.id
        // ), 0)) AS available_seats'),
        \DB::raw('(restaurants.nb_places - IFNULL((
            SELECT COUNT(*)
            FROM dishes
            WHERE dishes.restaurant_id = restaurants.id
            GROUP BY dishes.restaurant_id
        ), 0)) AS available_seats')
    ])
    ->where('name', 'LIKE', '%' . $search . '%')
    ->get();

    foreach($restaurants as $restaurant){
      $reviews = Review::select([
          'stars'
      ])
      ->where('restaurant_id',$restaurant->id)
      ->get();
      
      $moyenne = 0;
      foreach($reviews as $review){
        $moyenne += $review->stars;
      }
      $restaurant->note = round($moyenne / count($reviews), 1);
    }

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

    return Self::index($search, $filters);
  }

  public function show($id)
  {
    $restaurant = Restaurant::select([
      'restaurants.id',
      'restaurants.name',
      'restaurants.localisation',
      'restaurants.nb_places',
      'restaurants.image'
    ])
      ->where('restaurants.id', $id)
      ->first();

    $reviews = Review::select([
          'stars'
      ])
    ->where('restaurant_id',$restaurant->id)
    ->get();
    
    $moyenne = 0;
    foreach($reviews as $review){
      $moyenne += $review->stars;
    }
    $restaurant->note = round($moyenne / count($reviews), 1);

    $types = Type::select('name')
        ->join('restaurant_types','restaurant_types.type_id','types.id')
        ->where('restaurant_id',$restaurant->id)
        ->get();

    $dishes = Dishe::select([
      'dishes.id',
      'dishes.name',
      'dishes.description',
      'dishes.image',
      'dishes.price',
      'dishes.size',
    ])
      ->where('restaurant_id', $id)
      ->get();

    return view('restaurants.show', [
      'restaurant' => $restaurant,
      'dishes' => $dishes,
      'types' => $types
    ]);
  }

  public function map()
  {
    return view('maps.index');
  }
}
