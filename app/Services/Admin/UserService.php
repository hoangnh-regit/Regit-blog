<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function getAll(): LengthAwarePaginator
    {
        return User::byUserRole()->latest()->paginate(config('length.paginate'));
    }

    public function blockUser(User $user): bool
    {
        $status = $user->status == User::STATUS_ACTIVE ? User::STATUS_BLOCKED : User::STATUS_ACTIVE;
        return $user->update(['status' => $status]);
    }
}
