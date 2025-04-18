<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RestaurantController;
use App\Http\Middleware\IsAuthenticated;

Route::middleware([IsAuthenticated::class])->group(function () {
    // Route::get('/user', [UserController::class, 'index']);
    Route::get('/user', [UserController::class, 'show'])->name('profil');
    Route::get('/restaurant', [RestaurantController::class, 'profile'])->name('restaurant-profil');
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');

    Route::get('/home', function () {
        return view('home');
    })->name( 'home');

    Route::get('/booking', [BookingController::class, 'index'])->name('bookings');

    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants');
    Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurant');
    Route::post('/restaurants', [RestaurantController::class, 'search'])->name('search-restaurants');
});

Route::get('/', [loginController::class, 'login']);
Route::get('/login', [loginController::class, 'login']);
Route::get('/register', [loginController::class, 'register'])->name('register');
Route::post('/authenticate', [loginController::class, 'authenticate']);
