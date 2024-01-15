<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Services\Admin\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    const PATH_VIEW = 'admin.users.';

    public function __construct(
        private UserService $userService,
    ) {
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return view(self::PATH_VIEW.__FUNCTION__, compact('users'));
    }

    public function update(User $user)
    {
        $user = $this->userService->blockUser($user);
        return response()->json(['data' => $user]);
    }
}
