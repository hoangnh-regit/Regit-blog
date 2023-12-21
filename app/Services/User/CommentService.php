<?php
namespace App\Services\User;

use Exception;
use App\Models\Comment;

class CommentService
{
    public function store(array $data, int $blogId): Comment
    {
        try {
            return Comment::create([
                    'user_id' => auth()->user()->id,
                    'blog_id' => $blogId,
                    'content' => $data['content'],
                ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
