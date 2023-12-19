<?php

namespace App\Http\Controllers;

use App\Services\User\BlogService;
use App\Services\User\UserService;

class UserController extends Controller
{

    public function __construct(private UserService $userService, private BlogService $blogService)
    {
    }

    public function index()
    {
        $response = $this->userService->profile();
        $getMyBlogs = $this->blogService->getMyBlogs(auth()->user()->id);
        return view('user.profile', compact('response', 'getMyBlogs'));
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }
}
