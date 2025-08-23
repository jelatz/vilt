<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    public function getAllUsers()
    {
        return User::paginate(5);;
    }

    public function findUserByID($id)
    {
        return User::find($id);
    }
}
