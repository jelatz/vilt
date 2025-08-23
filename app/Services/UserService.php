<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    /**
     * Create a new class instance.
     */

    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function deleteUser($id)
    {
        $user = $this->userRepository->findUserByID($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
}
