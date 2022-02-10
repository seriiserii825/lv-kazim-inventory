<?php

namespace App\Http\Controllers\Api;

use App\Expense;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Resources\ExpenseResource;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        return ExpenseResource::collection(Expense::query()->orderByDesc('created_at')->get());
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense = Expense::create($request->validated());
        return new ExpenseResource($expense);
    }

    public function show(Expense $expense)
    {
        return new ExpenseResource($expense);
    }

    public function update(StoreExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->validated());
        return new ExpenseResource($expense);
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return response()->noContent();
    }
    public function count()
    {
        $count = Expense::query()->get()->count();
        return response()->json(["count" => $count]);
    }
}
