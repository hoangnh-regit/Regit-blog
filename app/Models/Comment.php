<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_id',
        'content',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function blog(): belongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
