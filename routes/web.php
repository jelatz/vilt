<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('Index');
// });

Route::get('/', function () {
    return Inertia::render('Index');
});

Route::inertia('/about', 'About', ['user' => 'John Doe']);
