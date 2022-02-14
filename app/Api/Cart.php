<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'product_id',
        'product_title',
        'price',
        'quantity',
        'sub_total',
    ];
}
