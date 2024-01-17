<?php

namespace App\Services\Admin;

use App\Models\Blog;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogService
{
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
}
