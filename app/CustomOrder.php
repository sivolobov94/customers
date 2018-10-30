<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CustomOrder extends Model
{
    protected $table = 'custom_orders';
    protected  $fillable = [
        'name',
        'user_id',
        'description',
        'region',
        'user_name',
        'email',
        'phone',
        'category',
        'provider',
        'file'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
