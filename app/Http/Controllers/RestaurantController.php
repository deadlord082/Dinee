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
    ->join('restaurant_types','restaurants.id','restaurant_types.restaurant_id')
    ->where('restaurant_types.type_id','LIKE', '%' . $filter . '%')
    ->where('name', 'LIKE', '%' . $search . '%')
    ->groupBy('restaurants.id')
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
    $filter = $request->id ?? '';

    return Self::index($search, $filter);
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

      $reviews = Review::select([
          'stars',
          'comment',
          'reviews.created_at',
          'users.name',
          'users.image'
      ])
    ->where('restaurant_id',$restaurant->id)
    ->join('users','users.id','reviews.user_id')
    ->get();

    return view('restaurants.show', [
      'restaurant' => $restaurant,
      'dishes' => $dishes,
      'types' => $types,
      'reviews' => $reviews
    ]);
  }

  public function map()
  {
    return view('maps.index');
  }

  public function getFavorites ($search = '', $filter = '')
  {
    // 1. Récupération des restaurants avec nb_places et available_seats
    $restaurants = Restaurant::select([
      'restaurants.id',
      'restaurants.name',
      'restaurants.localisation',
      'restaurants.nb_places',
      'restaurants.image',
      \DB::raw('(restaurants.nb_places - IFNULL((
            SELECT COUNT(*)
            FROM dishes
            WHERE dishes.restaurant_id = restaurants.id
            GROUP BY dishes.restaurant_id
        ), 0)) AS available_seats')
    ])
      ->where('name', 'LIKE', '%' . $search . '%')
      ->get();

    // 2. Calcul de la note moyenne pour chaque restaurant
    foreach ($restaurants as $restaurant) {
      $reviews = Review::where('restaurant_id', $restaurant->id)->pluck('stars');

      $restaurant->note = $reviews->count() > 0
        ? round($reviews->avg(), 1)
        : null; // ou 0 si tu veux forcer une valeur

      // optionnel : tu peux ajouter $restaurant->review_count = $reviews->count();
    }

    return $restaurants->sortByDesc('note')->take(3)->values();
  }

  public function getNews($search = '', $filter = '')
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

    return $restaurants->sortByDesc('created_at')->take(3)->values();
  }
}
