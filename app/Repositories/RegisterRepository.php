<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterRepository{

public function create(array $data)
  {
    try{
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
      ]);
    } catch (\Exception $e) {
      // Handle the exception (e.g., log it, rethrow it, etc.)
      return null;
    }
  }
}