<?php

namespace App\Services\auth;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\EmailVerifyMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

/**
 * Class AuthService.
 */
class AuthService
{
    const DEFAULT_IMG = "images/team-1.jpg";
    
    public function register(array $data): bool | string
    {
        try {
            $token = Str::random(60);
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'image' => self::DEFAULT_IMG,
                'email_verified_token' => $token,
            ]);
            $mailData = [
                'title' => __('auth.hi_user') . $user->name,
                'token' => $user->email_verified_token,
            ];
            Mail::to($user->email)->send(new EmailVerifyMail($mailData));
            return true;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function verifyEmail(string $token): bool | string
    {
        try {
            $user = User::where('email_verified_token', $token)->first();
            if (!$user) {
                return __('auth.email_unregistered');
            }
            if ($user->email_verified_at != null) {
                return __('auth.invalid');
            }
            if ($user->created_at->addHours(2)->isPast()) {
                $user->delete();
                return __('auth.re_register');
            }
            return $user->update([
                    'email_verified_at' => now(),
                    'status' => User::STATUS_ACTIVE,
                ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
