<?php

namespace App\Http\Controllers;

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
        Auth::logout();
        return redirect('/login');
    }
}
