<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\Admin\CategoryService;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{
    const PATH_VIEW = 'admin.categories.';

    public function __construct(
        private CategoryService $categoryService,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->getAlls();
        return view(self::PATH_VIEW.__FUNCTION__, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $data = $this->categoryService->store($request->only('name'));
        $route = route('admins.categories.update', $data['id']);
        return response()->json(['data' => $data,'route' => $route]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $this->categoryService->update($request->only('name'), $category);
        return response()->json(['data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $data = $this->categoryService->delete($category);
        return response()->json(['data' => $data]);
    }
}
