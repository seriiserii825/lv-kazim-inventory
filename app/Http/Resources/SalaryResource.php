<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalaryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'amount' => $this->amount,
            'date' => $this->date,
            'month' => $this->month,
            'year' => $this->year,
            'employee_name' => $this->employee->name
        ];
    }
}
