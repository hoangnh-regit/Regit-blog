<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'img',
        'category_id',
        'status',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'likes', 'user_id', 'blog_id');
    }
}
