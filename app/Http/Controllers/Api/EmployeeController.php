<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Repositories\FileUploadRepository;
use App\Http\Requests\Api\StoreEmployeeRequest;
use App\Http\Requests\Api\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use function PHPUnit\Framework\returnArgument;

class EmployeeController extends Controller
{
    public function index()
    {
        return EmployeeResource::collection(Employee::query()->orderByDesc('created_at')->get());
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());
        return new EmployeeResource($employee);
    }

    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {

        $employee->update($request->validated());
        return new EmployeeResource($employee);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->noContent();
    }
}
