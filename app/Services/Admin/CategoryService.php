<?php

namespace App\Services\Admin;

use Exception;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    public function getAlls(): LengthAwarePaginator
    {
        return Category::latest()->paginate(config('length.paginate'));
    }

    public function store(array $data): Category
    {
        try {
            return Category::create(['name' => $data['name']]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function update(array $data, Category $category): bool
    {
        try {
            return $category->update([
                'name' => $data['name'],
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function delete(Category $category): bool
    {
        try {
            return $category->delete();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
