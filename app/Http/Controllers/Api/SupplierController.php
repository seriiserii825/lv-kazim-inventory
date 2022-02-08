<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        return SupplierResource::collection(Supplier::all());
    }

    public function store(StoreSupplierRequest $request)
    {
        $suppliers = Supplier::create($request->validated());
        return new SupplierResource($suppliers);
    }

    public function show(Supplier $supplier)
    {
        return new SupplierResource($supplier);
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->validated());
        return new SupplierResource($supplier);
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return response()->noContent();
    }

    public function count()
    {
        $count = Supplier::query()->get()->count();
        return response()->json(["count" => $count]);
    }
}
