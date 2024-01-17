<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Admin\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    const PATH_VIEW = 'admin.users.';

    public function __construct(
        private UserService $userService,
    ) {
    }

    public function index(Request $request)
    {
       
        $users = $this->userService->getAll($request->only('search'));
        return view(self::PATH_VIEW.__FUNCTION__, compact('users'));
    }

    public function update(User $user)
    {
        $user = $this->userService->blockUser($user);
        return response()->json(['data' => $user]);
    }
}
