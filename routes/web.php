<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;

use Inertia\Inertia;

// Route::get('/', function () {
//     return view('Index');
// });

// sleep(1);
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'loginIndex'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/register', [AuthController::class, 'index'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');

    Route::get('/forgot-password', fn() => Inertia::render('Auth/ForgotPassword'))
        ->name('password.request');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/users/{id}', [DashboardController::class, 'destroy'])->name('users.destroy');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
