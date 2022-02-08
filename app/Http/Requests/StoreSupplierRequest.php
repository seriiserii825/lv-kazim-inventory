<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:suppliers,name',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'required',
            'shop_name' => 'nullable',
        ];
    }
}
