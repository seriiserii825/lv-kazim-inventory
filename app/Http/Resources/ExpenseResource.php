<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'details' => $this->details,
            'amount' => $this->amount,
            'date' => $this->date
        ];
    }
}