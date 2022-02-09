<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required',
            'supplier_id' => 'required',
            'title' => 'required|unique:products',
            'code' => 'required',
            'root' => 'nullable',
            'buying_price' => 'nullable',
            'selling_price' => 'nullable',
            'buying_date' => 'required',
            'image' => 'nullable',
            'product_quantity' => 'required'
        ];
    }
}
