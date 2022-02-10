<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Product;
use App\Supplier;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::query()->orderByDesc('created_at')->get());
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        return new ProductResource($product);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function productCreate()
    {
        $categories = Category::query()->select('id', 'title')->get();
        $suppliers = Supplier::query()->select('id', 'name')->get();
        return response()->json([
            'categories' => $categories,
            'suppliers' => $suppliers,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }

    public function count()
    {
        $count = Product::query()->get()->count();
        return response()->json(["count" => $count]);
    }
}