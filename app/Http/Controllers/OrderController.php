<?php

namespace App\Http\Controllers;

use App\Notifications\DoOrder;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function doOrder(Request $request)
    {
        $request->validate(
            [
                'quantity' => 'required|digits_between:1,10',
                'comment' => 'string|max:140'
            ]
        );
        $products = Product::all();
        $product = Product::find($request->id);
        $to_user = User::find($product->user_id);
        $from_user = User::find(Auth::user()->getAuthIdentifier());
        Notification::send($to_user, new DoOrder($from_user, $to_user, $product, $request->quantity, $request->comment));
        return view('products.index', ['items' => $products]);
    }
}
