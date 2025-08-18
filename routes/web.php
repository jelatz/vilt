<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

use Inertia\Inertia;

// Route::get('/', function () {
//     return view('Index');
// });

// sleep(1);
Route::get('/', function () {
    return Inertia::render('Auth/Login');
});
