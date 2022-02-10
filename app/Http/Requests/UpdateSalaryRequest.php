<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalaryRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'employee_id' => 'required|unique:salaries,employee_id,' . $this->employee_id . ',employee_id',
            'amount' => 'required',
            'date' => 'nullable',
            'month' => 'nullable',
            'year' => 'nullable',
        ];
    }
}