<?php

namespace App\Http\Controllers\Api;

use App\Api\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
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
        $cart = Cart::create($request->validated());
        return new CartResource($cart);
    }

    public function show($id)
    {
        //
    }

    public function update(UpdateCartRequest $request, $id)
    {
        $cart = Cart::query()->where('product_id', $id)->first();
        $data = $request->validated();
        $data['quantity'] += 1;
        $data['sub_total'] = $data['quantity'] * $data['price'];
        $cart->update($data);

//        return new CartResource($data);
        return response()->json([
            'cart' => $cart,
            'data' => $data
        ]);
    }

    public function destroy($id)
    {

        $id = (int)$id;

        $cart = Cart::query()->where('product_id', $id)->first();
        $cart->delete();
        return response()->noContent();
    }

    public function productExistsInCart(Request $request, $product_id)
    {
        $product_exists = Cart::query()->where('product_id', $product_id)->exists();

        return response()->json([
            'product_exists' => $product_exists
        ]);
    }
}
