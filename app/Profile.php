<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = ['name', 'user_id', 'company', 'phone', 'region', 'address'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
