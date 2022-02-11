<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use App\Http\Resources\SalaryResource;
use App\Salary;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function index()
    {
        return SalaryResource::collection(Salary::query()->orderByDesc('created_at')->get());
    }

    public function store(StoreSalaryRequest $request)
    {
        $category = Salary::create($request->validated());
        return new SalaryResource($category);
    }

    public function show(Salary $category)
    {
        return new SalaryResource($category);
    }

    public function update(UpdateSalaryRequest $request, Salary $category)
    {
        $category->update($request->validated());
        return new SalaryResource($category);
    }

    public function destroy(Salary $category)
    {
        $category->delete();
        return response()->noContent();
    }

    public function count()
    {
        $count = Salary::query()->get()->count();
        return response()->json(["count" => $count]);
    }

    public function salaryCreate()
    {
        // $employees = Employee::query()->select('id', 'name')->get();
        $employees = DB::table('employees AS emp')
            ->select('emp.id', 'emp.name')
            ->leftJoin('salaries AS sal', 'sal.employee_id', '=', 'emp.id')
            ->whereNull('sal.employee_id')->get();

        return response()->json([
            'employees' => $employees
        ]);
    }
}