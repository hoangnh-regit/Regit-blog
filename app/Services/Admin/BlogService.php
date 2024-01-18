<?php

namespace App\Services\Admin;

use Exception;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\UpdateBlogRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogService
{
    const PATH_UPLOAD = 'public/images';

    public function index(array $filters): LengthAwarePaginator
    {
        $query = Blog::with('user', 'category')
            ->select('id', 'title', 'category_id', 'user_id', 'img', 'status', 'created_at');
        if (data_get($filters, 'status')) {
            $query->where('status', $filters['status']);
        }
        if (data_get($filters, 'date')) {
            $query->whereDate('created_at', $filters['date']);
        }
        return $query->latest()->paginate(config('length.paginate'))->appends($filters);
    }

    public function update(UpdateBlogRequest $request, Blog $blog): bool
    {
        try {
            $data = $request->except('img');
            if ($request->hasFile('img')) {
                $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
                if ($blog->img !== null && Storage::exists($blog->img)) {
                    Storage::delete($blog->img);
                }
            }
            return $blog->update($data);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
