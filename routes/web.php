<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('Index');
// });

// sleep(1);
Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::inertia('/about', 'About', ['user' => 'John Doe'])->name('about');

// Route::inertia('/auth/register', 'Auth/Register')->name('register');
Route::get('/auth/register', [AuthController::class, 'index'])->name('register');
Route::post('/auth/register', [AuthController::class, 'store']);

Route::get('/auth/login', [AuthController::class, 'loginIndex'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login']);
