<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::query()->orderByDesc('created_at')->get());
    }

    public function store(StoreOrderRequest $request)
    {

        $order = Order::create($request->validated());
        return new OrderResource($order);
    }

    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->noContent();
    }
}
