<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Type;
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
}
