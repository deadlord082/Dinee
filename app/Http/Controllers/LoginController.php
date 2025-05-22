<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        $userdata = array(
            'email' => $request->email,
            'password' => $request->password,
          );
        if (Auth::attempt($userdata)){
            // dd(Auth::user());
            return redirect('/home');
        }
        return back();        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function register_restaurant()
    {
        return view('user.register_restaurant');
    }

    public function add(Request $request)
    {
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = $request->password;
        $isInsert = User::insert($user);
        if($request->type === 'restaurant' && $isInsert === true){
            $user = User::all()->last();
            $restaurant['name'] = $request->restaurant_name;
            $restaurant['localisation'] = $request->localisation;
            $restaurant['nb_places'] = $request->nb_places;
            $restaurant['user_id'] = $user->id;
            Restaurant::insert($restaurant);
            return redirect('/login')->with('success', 'Votre compte à bien été créer');
        }
        else if($request->type === 'user' && $isInsert === true){
           return redirect('/login')->with('success', 'Votre compte à bien été créer'); 
        }
        else{
            return redirect()->back();
        }
  }
}
