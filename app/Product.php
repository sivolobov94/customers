<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'image'];

    public function create($data)
    {
       $product = new Product($data);
       $product->save();
    }
}
