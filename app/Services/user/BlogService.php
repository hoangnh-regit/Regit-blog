<?php

namespace App\Services\user;

use Exception;
use App\Models\Blog;

class BlogService
{
    public function store(array $data): Blog
    {
        try {
            $imageName = null;
            if (isset($data['img'])) {
                $imageName = $data['img']->store('blog_images');
            }

            return Blog::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'category_id' => $data['category_id'],
                'img' => $imageName,
                'user_id' => auth()->user()->id,
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
