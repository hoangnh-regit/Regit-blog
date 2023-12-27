<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserService
{
    const PATH_UPLOAD = 'public/images';

    public function profile(): array
    {
        return Auth::user()->only('name', 'email');
    }

    public function update(array $data, User $user): bool
    {
        try {
            $oldPathImg = '';
            if (data_get($data, 'image')) {
                $oldPathImg = $user->image;
                $data['image'] = Storage::put(self::PATH_UPLOAD, $data['image']);
            }
            $user->update($data);
            Storage::delete($oldPathImg);
            return true;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function newPassword()
    {
    }
}
