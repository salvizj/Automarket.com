<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {

    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [UserController::class, 'login'])->name('login');

    Route::middleware(['auth'])->group(function () {
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    });
    
    Route::get('/', function () {
        return view('home');
    })->name('home');
    
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
    Route::get('/car/create', [CarController::class, 'create'])->name('cars.create');
    
    Route::get('/user/profile', function () {
        return view('user.profile');
    });
    
    Route::get('/auth/login', function () {
        return view('auth.login');
    });
    
    Route::get('/auth/register', function () {
        return view('auth.register');
    });

});

