<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\RegisterService;
use App\Services\AuthService;


class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|string|email|max:80|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|string|same:password'
        ]);

        dd($validated);


        return to_route('login')->with(['success' => 'Registration successful!']);
    }

    public function loginIndex()
    {
        return Inertia::render('Auth/Login');
    }
}
