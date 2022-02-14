<?php

namespace App\Http\Controllers\Api;

use App\Customer;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return CustomerResource::collection(Customer::query()->orderByDesc('created_at')->get());
    }

    public function store(StoreCustomerRequest $request)
    {

        $customers = Customer::create($request->validated());
        return new CustomerResource($customers);
    }

    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    public function update(UpdateCustomerRequest $request, Employee $customer)
    {

        $customer->update($request->validated());
        return new CustomerResource($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->noContent();
    }

    public function count()
    {
        $count = Customer::query()->get()->count();
        return response()->json(["count" => $count]);
    }
}
