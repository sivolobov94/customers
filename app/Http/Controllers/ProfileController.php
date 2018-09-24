<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $current_user_id = Auth::user()->getAuthIdentifier();
        $user = User::find($current_user_id);
       // dd(Auth::user());
        return view('account.profile');
    }

    public function editProfile(Request $request)
    {
        return view('account.edit-profile', ['data' => $request->all()]);
    }
}
