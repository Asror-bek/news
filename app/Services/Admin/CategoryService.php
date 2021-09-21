<?php

namespace App\Services\Admin;

use App\Models\Category;

class CategoryService
{
    public function fetchAllWithPaginate()
    {
        return Category::query()->get();
    }

    public function createNewCategory(array $validated)
    {
        $category = new Category();
        $category->Name = $validated['Name'];
        $category->Description = $validated['Description'];
        $category->save();
        return $category;
    }

    public function updateExistingCategory(array $validated, Category $category)
    {
        $category->Name = $validated['Name'];
        $category->Description = $validated['Description'];
        $category->save();
        return $category;
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
    }
}



?>
