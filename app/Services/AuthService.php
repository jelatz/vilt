<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;


class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(array $validated)
    {
        $result = $this->authRepository->create($validated);
        return $result;
    }

    public function login(array $credentials)
    {
        $login = $this->authRepository->login($credentials);

        if ($login) {
            Auth::login($login, $credentials['rememberMe']);
        }

        return $login;
    }

    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return true;
    }
}
