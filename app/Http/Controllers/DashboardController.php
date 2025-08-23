<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Services\AuthService;
use App\Services\UserService;


class DashboardController extends Controller
{
    protected $authService;
    protected $userService;

    public function __construct(AuthService $authService, UserService $userService)
    {
        $this->authService = $authService;
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return Inertia::render('Dashboard', [
            'users' => $users
        ]);
    }

    public function destroy($id)
    {
        $delete = $this->userService->deleteUser($id);
        if ($delete) {
            return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
        }
    }
}
