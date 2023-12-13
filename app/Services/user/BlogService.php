<?php

namespace App\Services\user;

use Exception;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;

class BlogService
{
    public function store(array $data): Blog
    {
        try {
            $imageName = null;
            if (isset($data['img'])) {
                $imageName = $data['img']->store('public/images');
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

    public function show(int $id): Collection
    {
        try {
            return Blog::with('category')
                ->where('status', Blog::STATUS_ACTIVE)
                ->where('id', '!=', $id)
                ->inRandomOrder()
                ->limit(4)
                ->get();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getMyBlogs(int $id): Collection
    {
        return Blog::with('category')->where('user_id', $id)->select('id', 'title', 'category_id', 'status', 'img', 'updated_at')->get();
    }
}
