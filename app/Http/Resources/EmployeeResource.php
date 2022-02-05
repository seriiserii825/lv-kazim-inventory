<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'salary' => $this->salary,
            'join_date' => $this->join_date,
            'nid' => $this->nid,
            'photo' => $this->photo,
        ];
    }
}
