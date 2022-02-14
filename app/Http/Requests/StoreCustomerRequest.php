<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:customers,name',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'nullable'
        ];
    }
}
