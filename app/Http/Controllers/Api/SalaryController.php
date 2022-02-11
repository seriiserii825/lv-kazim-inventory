<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use App\Http\Resources\SalaryResource;
use App\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function index(Request $request)
    {
        $sort_field = $request->get('sort_field');
        $sort_direction = $request->get('sort_direction');
        return SalaryResource::collection(Salary::query()->orderBy($sort_field, $sort_direction)->get());
    }

    public function store(StoreSalaryRequest $request)
    {
        $salary = Salary::create($request->validated());
        return new SalaryResource($salary);
    }

    public function show(Salary $salary)
    {
        return new SalaryResource($salary);
    }

    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        $salary->update($request->validated());
        return new SalaryResource($salary);
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return response()->noContent();
    }

    public function count()
    {
        $count = Salary::query()->get()->count();
        return response()->json(["count" => $count]);
    }

    public function salaryCreate()
    {
        $employees = Employee::query()->select('id', 'name')->get();

        // $employees = DB::table('employees AS emp')
        //     ->select('emp.id', 'emp.name')
        //     ->leftJoin('salaries AS sal', 'sal.employee_id', '=', 'emp.id')
        //     ->whereNull('sal.employee_id')->get();

        return response()->json([
            'employees' => $employees
        ]);
    }

    public function salaryMonth(Request $request)
    {
        $salaries = DB::table('salaries')->select('salaries.month')->groupBy('month')->get();
        return response()->json([
            'salaries' => $salaries,
            'request' => $request->all()
        ]);
    }

    public function salaryMonthSingle(Request $request, $month)
    {
        // $query = Post::query()->orderByDesc('created_at');
        $sort_field = $request->get('sort_field');
        $sort_direction = $request->get('sort_direction');

        // if (!empty($value = $request->get('category_id'))) {
        //     $query->where('category_id', $value);
        // }

        // return PostResource::collection($query->orderBy($sort_field, $sort_direction)->paginate(4));

        $salaries = DB::table('salaries')
            ->leftJoin('employees', 'salaries.employee_id', '=', 'employees.id')
            ->select('employees.name', 'salaries.*')
            ->where('salaries.month', '=', $month)
            ->orderBy($sort_field, $sort_direction)
            ->get();

        return response()->json([
            'salaries' => $salaries,
            'sort_field' => $sort_field,
            'sort_direction' => $sort_direction,
        ], 200);
    }
}