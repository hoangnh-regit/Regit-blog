<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use App\Services\user\BlogService;
use App\Services\user\CategoryService;

class BlogController extends Controller
{
    
    const PATH_VIEW = 'blogs.';

    public function __construct(private CategoryService $categoryService, private BlogService $blogService)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view(self::PATH_VIEW.__FUNCTION__, compact('categories'));
    }
    
    public function store(BlogRequest $request)
    {
        $this->blogService->store($request->only('title', 'content', 'category_id', 'img'));
        return redirect()->route('home')->with('success', __('blog.blog_created'));
    }

    public function show(Blog $blog)
    {
        $relatedBlogs = $this->blogService->show($blog->id);
        return view(self::PATH_VIEW.__FUNCTION__, compact('blog', 'relatedBlogs'));
    }
}
