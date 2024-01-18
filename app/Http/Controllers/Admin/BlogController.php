<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Services\Admin\BlogService;
use App\Http\Controllers\Controller;
use App\Services\User\CategoryService;
use App\Http\Requests\Admin\CreateBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Services\User\BlogService as UserBlogService;

class BlogController extends Controller
{
    const PATH_VIEW = 'admin.blogs.';

    public function __construct(
        private BlogService $blogService,
        private UserBlogService $userBlogService,
        private CategoryService $categoryService,
    ) {
    }

    public function index(Request $request)
    {
        $filters = $request->only('status', 'date');
        $blogs = $this->blogService->index($filters);
        return view(self::PATH_VIEW . __FUNCTION__, compact('blogs'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }

    public function store(CreateBlogRequest $request)
    {
        $data = $this->userBlogService->store($request->only('title', 'content', 'status', 'category_id', 'img'));
        return redirect()->route('blogs.show', $data->id)->with('success', __('blog.blog_created'));
    }

    public function edit(Blog $blog)
    {
        $categories = $this->categoryService->getAll();
        return view(self::PATH_VIEW.__FUNCTION__, compact('blog', 'categories'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $this->blogService->update($request, $blog);
        return redirect()->route('admins.blogs.index', $blog)->with('success', __('admin.blog_updated'));
    }
}
