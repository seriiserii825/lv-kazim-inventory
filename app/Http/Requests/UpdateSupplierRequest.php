<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:suppliers,name,' . $this->name . ',name',
            'email' => 'required|email|unique:suppliers,email,' . $this->email . ',email',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'required',
            'shop_name' => 'nullable',
        ];
    }
}
