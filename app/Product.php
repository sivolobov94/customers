<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category',
        'region',
        'manufacturer',
        'measure',
        'price_for_one',
        'cashback'
        ];

    public function create($data)
    {
       $product = new Product($data);
       $product->save();
    }
}
