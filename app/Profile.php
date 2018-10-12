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

    public function getProfileByUserId($id)
    {
        return Profile::find($id);
    }

    public function editProfile($data)
    {
        $profile = Profile::updateOrCreate(
            ['user_id' => Auth::user()->getAuthIdentifier()],
            [
                'name' => $data['name'],
                'company' => $data['company'],
                'phone' => $data['phone'],
                'region' => $data['region'],
                'address' => $data['address']
            ]);
    }

    public function setName(Request $request)
    {
        return Profile::UpdateOrCreate(['user_id' => $request->input('id')], ['name' => $request->input('name')]);
    }
}
