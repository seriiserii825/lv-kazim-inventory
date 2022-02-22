<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'date' => 'required',
            'sub_total' => 'required',
            'vat' => 'required',
            'total' => 'required',
            'pay_by' => 'required',
            'products' => 'required'
        ];
    }
}
