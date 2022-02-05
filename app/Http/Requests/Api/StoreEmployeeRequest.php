<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
            'photo' => 'nullable',
        ];
    }
}
