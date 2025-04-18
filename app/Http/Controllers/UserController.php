<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
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
        // dd(User::findOrFail($id));
        $restaurant = Restaurant::select('localisation','nb_places','types.name as type_name','image')
        ->where('user_id','=',Auth::id())
        ->join('types','restaurants.type_id','types.id')
        ->get();
        if(count($restaurant) === 0){
            return view('user.profile', [
                'user' => Auth::user()
            ]);
        }
        else{
            return view('restaurants.profile', [
                'user' => Auth::user(),
                'restaurant' => $restaurant[0]
            ]);
        }
        
    }
}
