<?php

namespace App\Services\Admin;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryService
{
    /**
     * Bu funksiya categoriyalarni olib beradi
     * @return Builder[]|Collection
     */
    public function fetchAll()
    {

        return Category::query()->get();
    }

    /**
     * Yangi kategoriya yaratadi
     * @param array $validated
     * @return Builder|Model
     */
    public function createNewCategory(array $validated)
    {
        return Category::query()->create($validated);
    }

    public function updateExistingCategory(array $validated, Category $category)
    {
        return tap($category)->update($validated);
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
    }
}


?>
