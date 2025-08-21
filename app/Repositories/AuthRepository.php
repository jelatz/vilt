<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    public function create(array $data)
    {
        try {
            $user = User::create([
                'name' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            return $user;
        } catch (\Exception $e) {
            return $e->getMessage($data);
            // dd($e->getMessage(), $data);
        }
    }

    public function login(array $credentials)
    {
        try {
            $user = User::where('name', $credentials['username'])->first();

            if ($user && Hash::check($credentials['password'], $user->password)) {
                return $user;
            }

            return null;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
