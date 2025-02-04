<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'orderItems';

    protected $fillable = [
        'order_id',
        'product_id',
        'amount',
        'price'
    ];
}
