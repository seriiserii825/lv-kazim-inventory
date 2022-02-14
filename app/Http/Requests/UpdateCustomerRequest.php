<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:customers,name,' . $this->name . ',name',
            'email' => 'required|email|unique:customers,email,' . $this->email . ',email',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'required',
        ];
    }
}
