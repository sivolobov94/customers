<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public $role;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'affiliate_id', 'referred_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function customOrders()
    {
        return $this->hasMany('App\CustomOrder');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function setRole($role)
    {

    }

    public function getRole()
    {
        return $this->role;
    }
}
