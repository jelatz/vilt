<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
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
Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'store']);
