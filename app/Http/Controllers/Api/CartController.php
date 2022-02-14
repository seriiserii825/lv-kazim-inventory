<?php

namespace App\Http\Controllers\Api;

use App\Api\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return CartResource::collection(Cart::query()->orderByDesc('created_at')->get());
    }

    public function store(StoreCartRequest $request)
    {
        $employee = Cart::create($request->validated());
        return new CartResource($employee);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->noContent();
    }
}
