<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'token',
        'status',
        'expired_at',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
