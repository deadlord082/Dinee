<?php


use App\Http\Controllers\CartController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\IsAuthenticated;
use App\Http\Controllers\ProfileController;

Route::middleware([IsAuthenticated::class])->group(function () {
    Route::get('/user', [ProfileController::class, 'show'])->name('profil');
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');
    Route::get('/restaurant', [RestaurantController::class, 'profile'])->name('restaurant-profil');
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');

    Route::get('/home', [HomeController::class, 'index'])->name( 'home');

    Route::get('/booking', [BookingController::class, 'index'])->name('bookings');

    Route::get('/cart', [CartController::class, 'index'])->name('cart');

    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants');
    Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurant');
    Route::post('/restaurants', [RestaurantController::class, 'search'])->name('search-restaurants');
    Route::get('/map', [RestaurantController::class, 'map'])->name('restaurants-map');

    Route::prefix('settings')->group(function () {
      Route::get('/edit-profil', [SettingController::class, 'edit_profil'])->name('settings.edit-profil');
    });

    Route::prefix('cart')->group(function () {
      Route::get('/', [CartController::class, 'index'])->name('cart.index');
      Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
      Route::patch('/update/{product}', [CartController::class, 'update'])->name('cart.update');
      Route::delete('/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
      Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
      Route::post('/save', [CartController::class, 'save'])->name('cart.save');
    });
});

Route::get('/', [loginController::class, 'login']);
Route::get('/login', [loginController::class, 'login'])->name('login');
Route::get('/register', [loginController::class, 'register'])->name('register');
Route::get('/register_restaurant', [loginController::class, 'register_restaurant'])->name('register_restaurant');
Route::post('/add', [loginController::class, 'add'])->name('add');
Route::post('/authenticate', [loginController::class, 'authenticate']);
