<?php
namespace App\Services\User;

use Exception;
use App\Models\Blog;
use App\Models\Comment;

class CommentService
{
    public function store(array $data, int $blogId): array
    {
        try {
            $comment = Comment::create([
                    'user_id' => auth()->user()->id,
                    'blog_id' => $blogId,
                    'content' => $data['content'],
                ]);
            $blog = Blog::with('comments')->where('id', $blogId)->get();
            $getListcomment = Comment::with('user')->where('blog_id', $blogId)->latest()->get();
            return ['comment' => $comment, 'list_comments' => $getListcomment, 'blog' => $blog];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function update(array $data, Comment $comment): bool
    {
        try {
            return $comment->update([
                    'content' => $data['content'],
                ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function destroy(Comment $comment): bool
    {
        try {
            return $comment->delete();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
