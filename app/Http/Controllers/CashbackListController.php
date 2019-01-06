<?php

namespace App\Http\Controllers;

use App\CashbackList;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashbackListController extends Controller
{

    public function index()
    {
        $items = CashbackList::all();
        return view('admin.cashback-list', ['items' => $items]);
    }

}
