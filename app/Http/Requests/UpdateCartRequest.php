<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'required',
            'product_title' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'sub_total' => 'required'
        ];
    }
}
