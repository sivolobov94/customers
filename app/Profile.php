<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getProfileById($id)
    {
        return Profile::find($id);
    }

    public function editProfile($id)
    {
        $profile = Profile::find($id);
        $profile
        return
    }
}
