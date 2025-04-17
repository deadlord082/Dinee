<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\IsAuthenticated;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([IsAuthenticated::class])->group(function () {
    // Route::get('/user', [UserController::class, 'index']);
    Route::get('/user', [UserController::class, 'show']);
    Route::get('/logout', [loginController::class, 'logout']);
});

Route::get('/login', [loginController::class, 'login']);
Route::post('/authenticate', [loginController::class, 'authenticate']);