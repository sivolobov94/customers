<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_DISAGREE = 1;
    const STATUS_WAITING = 2;
    const STATUS_AGREE = 3;

    protected $table = 'orders';
    protected $fillable = [
        'buyer_id',
        'sale_id',
        'product_name',
        'product_price',
        'product_quantity',
        'sale',
        'sum',
        'cashback',
        'status'
    ];
}
