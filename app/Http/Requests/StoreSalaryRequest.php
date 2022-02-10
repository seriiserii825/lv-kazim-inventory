<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalaryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'employee_id' => 'required|unique:salaries',
            'amount' => 'required',
            'date' => 'nullable',
            'month' => 'nullable',
            'year' => 'nullable',
        ];
    }
}
