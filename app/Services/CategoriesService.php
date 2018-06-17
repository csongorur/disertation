<?php

namespace App\Services;


use App\Models\Category;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class CategoriesService
{
    use ValidatesRequests;


    /**
     * Category validation.
     * @param Request $request
     */
    public function validation(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);
    }

    /**
     * Return a category.
     * @param Category $category
     * @return Category
     */
    public function show(Category $category) {
        return $category;
    }

    /**
     * Store a category.
     * @param Request $request
     * @return Category
     */
    public function store(Request $request) {
        $category = Category::create([
            'name' => $request->get('name')
        ]);

        return $category;
    }

    /**
     * Update a category.
     * @param Category $category
     * @param Request $request
     * @return Category
     */
    public function update(Category $category, Request $request) {
        $category->update([
            'name' => $request->get('name')
        ]);

        return $category;
    }

    /**
     * Delete a category.
     * @param Category $category
     * @throws \Exception
     */
    public function delete(Category $category) {
        try {
            $category->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}