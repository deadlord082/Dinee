<?php

namespace App\Http\Controllers;

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
        return view('user.profile', [
            'user' => Auth::user()
        ]);
    }
}
