<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'date' => $this->date,
            'sub_total' => $this->sub_total,
            'vat' => $this->vat,
            'total' => $this->total,
            'pay_by' => $this->pay_by,
            'products' => $this->products
        ];
    }
}
