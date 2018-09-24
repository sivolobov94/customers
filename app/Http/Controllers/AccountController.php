<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function getLogo()
    {
        return view('account.logo');
    }

    public function editEmail()
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
