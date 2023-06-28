<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

    Route::get('/auth/login', function () {
        return view('auth.login');
    })->name('login.form');

    Route::post('/auth/login', [UserController::class, 'login'])->name('login');

    Route::get('/auth/register', function () {
        return view('auth.register');
    })->name('register.form');

    Route::post('/auth/register', [UserController::class, 'register'])->name('register');

    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [UserController::class, 'show'])->name('profile.show');
        Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    });
Route::view('/', 'home')->name('home');
    Route::get('/user/profile', function () {
        return view('user.profile');
    });

    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/cars/create', [CarController::class, 'store'])->name('cars.store');
    Route::get('/cars/show', [CarController::class, 'show'])->name('cars.show');
    Route::get('/cars/myshow', [CarController::class, 'myshow'])->name('cars.myshow');
    Route::get('/cars/view/{id}', [CarController::class, 'view'])->name('cars.view');
    Route::put('/cars/view/{id}', [CarController::class, 'update'])->name('cars.update');
    Route::post('/cars/show', [CarController::class, 'filter'])->name('car.filter');
    Route::delete('/cars/{id}', [CarController::class, 'listingdestroy'])->name('cars.listingdestroy');

Route::view('/', 'home')->name('home');

Route::get('lang/{lang}', function ($lang) {
    session()->put('lang', $lang);
    return back();
})->name('change.language');

});