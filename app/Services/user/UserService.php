<?php

namespace App\Services\user;

use Illuminate\Support\Facades\Auth;

class UserService
{
    public function profile(): array
    {
        return Auth::user()->only('name', 'email', 'status');
    }
}
