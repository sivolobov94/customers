<?php

namespace App\Http\Controllers;

use App\Categories;
use App\CustomOrder;
use App\Notifications\NewOrder;
use App\Profile;
use App\Regions;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CustomOrderController extends Controller
{
    public function getCustomOrderCreate()
    {
        $categories = Categories::all();
        $regions = Regions::all();

        return view('custom_order.create', ['categories' => $categories, 'regions' => $regions]);
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
                'file' =>'file|nullable'
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

        $file = $request->file('file');
        if ($file) {
            $file->move('custom_orders_files', $file->getClientOriginalName());
            $order->file= 'custom_orders_files/'.$file->getClientOriginalName();
        }
        $order->save();

        $profiles = Profile::all();
        $filtred_profiles = $profiles->where('category', $order->category);
        $from_user = User::find(Auth::user()->getAuthIdentifier());
        foreach ($filtred_profiles as $profile) {
            $to_user = User::find($profile->user_id);
            Notification::send($to_user, new NewOrder($from_user, $order->id));
        }

        return view('custom_order.success');
    }

    public function getCustomOrderSuccess()
    {
        return view('custom_order.success');
    }

    public function show($id)
    {
        $order = CustomOrder::find($id);
        return view('custom_order.detail', ['order' => $order]);
    }
}
