<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                Rule::unique('carts')
                    ->where('product_id', $this->product_id)
            ],
            'product_title' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'sub_total' => 'required'
        ];
    }
}
