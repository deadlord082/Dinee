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
        // dd($request->email,$request->password);
        $userdata = array(
            'email' => $request->email,
            'password' => $request->password,
          );
        if (Auth::attempt($userdata)){
            // dd(Auth::user());
            return redirect('/user/'.Auth::id());
        }
        return back();        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
