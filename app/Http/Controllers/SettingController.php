<?php

namespace App\Http\Controllers;

use App\Models\Dishe;
use Auth;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit_profil(){
        $user = Auth::user();

        return view('settings.edit_profil', [
            'user' => $user,
        ]);
    }
    
}
