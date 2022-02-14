<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'product_id' => $this->product_id,
            'product_title' => $this->product_title,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'sub_total' => $this->sub_total
        ];
    }
}
