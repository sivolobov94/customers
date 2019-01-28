<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = [
        'name',
        'email',
        'user_id',
        'company',
        'phone',
        'region',
        'address',
        'logo',
        'category',
        'small_description',
        'description',
        'site',
        'balance',
        'accepted_balance',
        'referal',
        'r_fullname',
        'r_name',
        'r_date_create',
        'r_law_address',
        'r_post_address',
        'r_director',
        'r_chief_accountant',
        'r_email',
        'r_phone',
        'r_fax',
        'r_INN',
        'r_KPP',
        'r_OGRN',
        'r_OKPO',
        'r_OKATO',
        'r_bank_requisites',
        'r_cashback'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
