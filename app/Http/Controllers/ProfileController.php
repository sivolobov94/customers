<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->first();
        return view('account.profile', ['profile' => $profile]);
    }

    public function getEditProfile()
    {
        $profile = User::find(Auth::user()->getAuthIdentifier())->profile;
        return view('account.edit-profile', ['profile' => $profile]);
    }

    public function postEditProfile(Request $request)
    {
        $profile = User::find(Auth::user()->getAuthIdentifier())->profile;
        $profile->name = $request->name;
        $profile->company = $request->company;
        $profile->phone = $request->phone;
        $profile->region = $request->region;
        $profile->address = $request->address;
        $profile->save();

        return view('account.profile', ['profile' => $profile]);
    }

    public function getLogo()
    {
        return view('account.logo');
    }

    public function postLogoEdit()
    {

    }

    public function getEditEmail()
    {
        $user = User::where('id', Auth::user()->getAuthIdentifier())->first();
        return view('account.edit-email', ['email' => $user->email]);
    }


    public function postEditEmail(Request $request)
    {
        $user = User::where('id', Auth::user()->getAuthIdentifier())->first();
        $user->email = $request->input('email');
        return view('account.edit-email', ['email' => $user->email]);
    }

    public function getEditPassword()
    {
        return view('account.edit-password');
    }

    public function postEditPassword(Request $request)
    {
        $user = User::where('id', Auth::user()->getAuthIdentifier())->first();
        if (password_verify($request->input('current_password'), $user->password) && $request->input('new_password') === $request->input('accept_password')) {
            $user->password = $request->input('new_password');
            $user->save();
            return view('account.edit-password-success');
        } else {
            return view('account.edit-password');
        }
    }

    public function getField()
    {
        return view('account.field');
    }

    public function getPayment()
    {
        return view('account.payment');
    }

    public function getDescription()
    {
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->first();
        return view('account.description', ['profile' => $profile]);
    }

    public function getEditDescription()
    {
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->first();
        return view('account.edit-description', ['profile' => $profile]);
    }

    public function postEditDescription(Request $request)
    {
        $data = $request->all();
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->first();
        $profile->small_description = $data['small_description'];
        $profile->description = $data['description'];
        $profile->site = $data['site'];
        $profile->save();

        return view('account.description', ['profile' => $profile]);
    }
    public function getRequisites()
    {
        return view('account.requisites');
    }

    public function getEditRequisites()
    {
        return view('account.edit-requisites');
    }

    public function postEditRequisites(Request $request)
    {
        $requisites = DB::table('requisites')->where('user_id', Auth::user()->getAuthIdentifier())->first();
        return view('account.requisites');
    }

    public function getProducts()
    {
        $products = User::find(Auth::user()->getAuthIdentifier())->products;
        //dd($products);
        return view('account.products', ['products' => $products]);
    }

    public function getNotifications()
    {
        return view('account.notifications');
    }

    public function getOrders()
    {
        return view('account.orders');
    }

    public function getPrice()
    {
        return view('account.price');
    }

    public function getReferal()
    {
        return view('account.referal');
    }

    public function getBill()
    {
        return view('account.bill');
    }

    public function getDocuments()
    {
        return view('account.documents');
    }

    public function getReferalPartner()
    {
        return view('account.referal-partner');
    }

}
