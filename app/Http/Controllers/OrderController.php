<?php

namespace App\Http\Controllers;

use App\Category;
use App\Notifications\DoOrder;
use App\Order;
use App\Product;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function doOrder(Request $request)
    {
        if(Auth::user()->toArray()['role'] === 'sale') {
            return redirect()
                ->back()
                ->withErrors(
                    ['msg' => 'Пользователи являющиеся продавцами не могут заказывать товары']
                );
        }
        $request->validate(
            [
                'quantity' => 'required|numeric|max:9999999',
                'comment' => 'max:140'
            ]
        );
        $products = Product::all();
        $product = Product::find($request->id);
        $to_user = User::find($product->user_id);
        $balance = (int)$request->quantity * (int)$product->price_for_one * ((int)$product->cashback / 100);
        $from_user = User::find(Auth::user()->getAuthIdentifier());
        Profile::firstOrCreate(['user_id' => $from_user->id, 'balance' => $balance]);
        $categories = Category::all();
        $order = New Order;
        $order->buyer_id= $from_user->id;
        $order->sale_id = $to_user->id;
        $order->product_name = $product->name;
        $order->product_price = $product->price_for_one;
        $order->product_quantity = $request->quantity;
        $order->sale = $to_user->name ?? 'Пользователь без имени';
        $order->sum = (int)$request->quantity * (int)$product->price_for_one;
        $order->cashback = $balance;
        $order->save();
        Notification::send($to_user, new DoOrder($from_user, $to_user, $product, $request->quantity, $request->comment));
        return view('products.index', ['items' => $products, 'categories' => $categories]);
    }

    public function payAccept(Request $request)
    {
        $order = Order::find($request->order_id);
        $buyer = User::find($order->buyer_id);
        $buyer = $buyer->profile()->first();
        $buyer->balance = $buyer->balance - $order->cashback;
        $buyer->accepted_balance = $buyer->accepted_balance + $order->cashback;
        $buyer->save();
        $order->accepted = true;
        $order->save();
        return view('account.pay-accept-success');
    }
}
