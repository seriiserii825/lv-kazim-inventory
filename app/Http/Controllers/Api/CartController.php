<?php

namespace App\Http\Controllers\Api;

use App\Api\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Resources\CartResource;
use http\Env\Response;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return CartResource::collection(Cart::query()->orderByDesc('created_at')->get());
    }

    public function store(StoreCartRequest $request)
    {
        if ($request->get('quantity')) {
        }
        $employee = Cart::create($request->validated());
        return new CartResource($employee);
    }

    public function show($id)
    {
        //
    }

    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $data = $request->validated();
        $data['product_quantity'] += 1;
        $cart->update();

        return new CartResource($$data);
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
        // $product_exists = Cart::query()->where('product_id', $product_id)->exists();

        return response()->json([
            'request' => $request->all(),
            'product_id' => $product_id,
        ]);
    }
}
