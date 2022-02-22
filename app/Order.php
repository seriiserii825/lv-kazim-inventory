<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'date',
        'sub_total',
        'vat',
        'total',
        'pay_by',
        'products'
    ];

    protected $casts = [
        'products' => 'array',
    ];
}
