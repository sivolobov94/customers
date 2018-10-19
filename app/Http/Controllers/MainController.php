<?php

namespace App\Http\Controllers;


use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
            //$username = User::find(Auth::user()->getAuthIdentifier())->profile->name;
           // $email = User::find(Auth::user()->getAuthIdentifier())->email;

        return view('main');
    }
}