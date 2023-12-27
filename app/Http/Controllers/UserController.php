<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\User\BlogService;
use App\Services\User\UserService;
use App\Http\Requests\UpdateProfileRequest;

class UserController extends Controller
{

    public function __construct(private UserService $userService, private BlogService $blogService)
    {
    }

    public function index()
    {
        $user = auth()->user();
        $response = $this->userService->profile();
        $getMyBlogs = $this->blogService->getMyBlogs($user->id);
        $getLikedBlogs = $this->blogService->getLikedBlogs($user);
        return view('user.profile', compact('response', 'getMyBlogs', 'getLikedBlogs'));
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        $this->userService->update($request->only('name', 'image'), $user);
        return redirect()->route('users.home')->with('success', __('auth.profile_update'));
    }
}
