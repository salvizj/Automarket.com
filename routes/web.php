<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Auth;
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

    Route::get('/', function () {
        return view('home');
    })->name('home');
    
    Route::get('/user/profile', function () {
        return view('user.profile');
    });
    
    Route::get('/car/create', [CarController::class, 'create'])->middleware('auth')->name('cars.create');
    Route::post('/cars', [CarController::class, 'store'])->middleware('auth')->name('cars.store');
});
