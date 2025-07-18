<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\RegisterService;


class AuthController extends Controller
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function index()
    {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:80|unique:users',
            'password' => 'required|confirmed',
        ]);


        $result = $this->registerService->registerUser($validated);
        return Inertia::render('Home', [
            'result' => $result,
        ])->with('success', 'Registration successful!');
    }

    public function loginIndex()
    {
        return Inertia::render('Auth/Login');
    }
}
