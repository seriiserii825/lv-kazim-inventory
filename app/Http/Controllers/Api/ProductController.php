<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Product;
use App\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->product_quantity && $request->product_quantity === 'in_stock') {
            $query = $query->where('product_quantity', '>', 0);
        }
        if ($request->category_id && $request->category_id !== "0") {
            $query = $query->where('category_id', '=', $request->category_id);
        }

        $sort_field = $request->get('sort_field');
        $sort_direction = $request->get('sort_direction');
        return ProductResource::collection($query->orderBy($sort_field, $sort_direction)->get());
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
