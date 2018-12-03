<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashbackList extends Model
{
    protected $table = 'cashback_lists';
    protected $fillable =
        [
            'user_id',
            'username',
            'sum',
            'bank_requisites',
        ];
}
