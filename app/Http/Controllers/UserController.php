<?php

namespace App\Http\Controllers;

use App\Services\user\UserService;

class UserController extends Controller
{

    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $response = $this->userService->profile();
        return view('user.profile', compact('response'));
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }
}
