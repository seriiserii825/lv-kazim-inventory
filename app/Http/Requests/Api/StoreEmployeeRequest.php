<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:employees,name',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'join_date' => 'required',
            'nid' => 'nullable',
            'photo' => 'required'
        ];
    }
}
