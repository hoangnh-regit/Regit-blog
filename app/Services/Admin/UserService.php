<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function getAll(array $data): LengthAwarePaginator
    {
        $query = User::byUserRole();
        if (data_get($data, 'search')) {
            $query->where(function ($query) use ($data) {
                $query->where('name', 'like', '%' . $data['search'] . '%')
                    ->orWhere('email', 'like', '%' . $data['search'] . '%');
            });
        }
        return $query->paginate(config('length.paginate'));
    }

    public function blockUser(User $user): bool
    {
        $status = $user->status == User::STATUS_ACTIVE ? User::STATUS_BLOCKED : User::STATUS_ACTIVE;
        return $user->update(['status' => $status]);
    }
}
