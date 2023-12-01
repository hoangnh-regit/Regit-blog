<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\auth\AuthService;

class AuthController extends Controller
{
    public AuthService $authService;

    public function __construct(AuthService $authSevice)
    {
        $this->authService = $authSevice;
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(AuthRequest $request)
    {
        $response = $this->authService->register($request->only('name', 'email', 'password'));
        if ($response) {
            return redirect()->route('get.register')->with('success', __('auth.verify_check_mail'));
        }
        return redirect()->route('get.register')->with('error', __('auth.email_unregistered'));
    }

    public function verifyEmail(string $token)
    {
        $response = $this->authService->verifyEmail($token);
        if (is_string($response)) {
            return redirect()->route('get.register')->with('error', $response);
        }
        return redirect()->route('get.register')->with('success', __('auth.verified'));
    }
}
