<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getAccount($id)
    {
        $profile = Profile::where('user_id', $id)->first();
        return view('account.profile', ['profile' => $profile]);
    }
}
