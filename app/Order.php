<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
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
        'accepted'
    ];


    public function getOrdersForOne($user_id)
    {
        $products = Product::find();
    }
}
