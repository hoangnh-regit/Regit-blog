<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;

class UserService
{
    public function profile(): array
    {
        return Auth::user()->only('name', 'email');
    }
}
