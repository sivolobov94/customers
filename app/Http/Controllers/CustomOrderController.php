<?php

namespace App\Http\Controllers;

use App\CustomOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomOrderController extends Controller
{
    public function getCustomOrderCreate()
    {
        return view('custom_order.create');
    }

    public function postCustomOrderCreate(Request $request)
    {
        $validator = $request->validate(
            [
                'name' => 'required|string',
                'description' => 'required|string',
                'region' => 'string|nullable',
                'user_name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'category' => 'string',
                'file' =>'string|nullable'
        ]);

        $order = new CustomOrder();
        $order->name = $request->name;
        $order->user_id = Auth::user()->getAuthIdentifier();
        $order->description = $request->description;
        $order->region = $request->region;
        $order->user_name = $request->user_name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->category = $request->category;
        $order->file = $request->file;
        $order->save();
        return view('custom_order.success');
    }

    public function getCustomOrderSuccess()
    {
        return view('custom_order.success');
    }
}
