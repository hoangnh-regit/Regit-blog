<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return back()->with('success', 'Student created successfully.');
    }
}
