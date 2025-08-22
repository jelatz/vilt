<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\AuthService;
use Illuminate\Validation\ValidationException;


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
            'password' => 'required|confirmed|min:8',
        ]);

        $storeUser = $this->authService->register($validated);
        if ($storeUser) {
            return to_route('login');
        } else {
            return to_route('register');
        }
    }

    public function loginIndex()
    {
        return Inertia::render('Auth/Login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username'   => 'required|string',
            'password'   => 'required|string',
            'rememberMe' => 'nullable|boolean',
        ]);

        $login = $this->authService->login($validated);
        if ($login) {
            return to_route('dashboard');
        }
        throw ValidationException::withMessages([
            'message' => 'Invalid username or password.',
        ]);
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return to_route('login');
    }
}
