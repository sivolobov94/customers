<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->get();
        return view('account.profile', ['profile' => $profile]);
    }

    public function getEditProfile()
    {
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->get();
        
        return view('account.edit-profile', ['profile' => $profile]);
    }

    public function postEditProfile(Request $request)
    {
        Profile::updateOrCreate(
            ['user_id' => Auth::user()->getAuthIdentifier()],
            [   'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'company' => $request->input('company'),
                'region' => $request->input('region'),
                'address' => $request->input('address')
            ]
        );
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->get();
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
        return view('account.edit-email');
    }

    public function editPassword()
    {
        return view('account.edit-password');
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
        return view('account.description');
    }

    public function getRequisites()
    {
        return view('account.requisites');
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
