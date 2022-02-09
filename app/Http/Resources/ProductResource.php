<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'supplier_id' => $this->supplier_id,
            'title' => $this->title,
            'code' => $this->code,
            'root' => $this->root,
            'buying_price' => $this->buying_price,
            'selling_price' => $this->selling_price,
            'buying_date' => $this->buying_date,
            'image' => $this->image,
            'product_quantity' => $this->product_quantity,
            'category_title' => $this->category->title,
            'supplier_title' => $this->supplier->name
        ];
    }
}
