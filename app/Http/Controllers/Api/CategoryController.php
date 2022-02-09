<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::query()->orderByDesc('created_at')->get());
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return new CategoryResource($category);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent();
    }

    public function count()
    {
        $count = Category::query()->get()->count();
        return response()->json(["count" => $count]);
    }
}
