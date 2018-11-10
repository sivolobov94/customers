<?php

namespace App\Http\Controllers;

use App\Categories;
use App\CustomOrder;
use App\Profile;
use App\Regions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->first();
       // dd($profile);
        return view('account.profile', ['profile' => $profile]);
    }

    public function getEditProfile()
    {
        $profile = User::find(Auth::user()->getAuthIdentifier())->profile;
        $categories = Categories::all();
        $regions= Regions::all();

        return view('account.edit-profile', ['profile' => $profile, 'categories' => $categories, 'regions' => $regions]);
    }

    public function postEditProfile(Request $request)
    {
        //dd($request);
        $profile = Profile::firstOrCreate(['user_id' => Auth::user()->getAuthIdentifier()]);
        $profile->name = $request->name;
        $profile->company = $request->company;
        $profile->phone = $request->phone;
        $profile->region = $request->region;
        $profile->address = $request->address;
        $profile->small_description = $request->small_description;
        $profile->description = $request->description;
        $profile->site = $request->site;
        $profile->category = $request->category;
        //реквизиты
        $profile->r_fullname= $request->r_fullname;
        $profile->r_name = $request->r_name;
        $profile->r_date_create = $request->r_date_create;
        $profile->r_law_address = $request->r_law_address;
        $profile->r_post_address = $request->r_post_address;
        $profile->r_director = $request->r_director;
        $profile->r_chief_accountant = $request->r_chief_accountant;
        $profile->r_email = $request->r_email;
        $profile->r_phone = $request->r_phone;
        $profile->r_fax = $request->r_fax;
        $profile->r_INN = $request->r_INN;
        $profile->r_KPP = $request->r_KPP;
        $profile->r_OGRN = $request->r_OGRN;
        $profile->r_OKPO = $request->r_OKPO;
        $profile->r_OKATO = $request->r_OKATO;
        $profile->r_bank_requisites = $request->r_bank_requisites;
        $profile->r_cashback = $request->r_cashback;

        $logo = $request->file('image');
        if ($logo->isValid()) {
            $logo->move('company_logos', $logo->getClientOriginalName());
            $profile->logo= 'company_logos/'.$logo->getClientOriginalName();
        }
        $profile->save();

        return view('account.profile', ['profile' => $profile]);
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
            return view('account.profile');
        } else {
            return view('account.edit-password');
        }
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
        $orders = User::find(Auth::user()->getAuthIdentifier())->customOrders()->get();
        return view('account.orders',['orders' => $orders] );
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
