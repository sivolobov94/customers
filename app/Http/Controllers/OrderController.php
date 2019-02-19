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
        if (Auth::user()->toArray()['role'] === 'sale') {
            return redirect()
                ->back()
                ->withErrors(
                    ['msg' => 'Пользователи являющиеся продавцами не могут заказывать товары']
                );
        }
        $messages = [
            'quantity.min' => 'Оформить заказ можно минимум на 1 единицу.',
            'quantity.max' => 'Оформить заказ можно максимум на 9999999 единицу.'
        ];
        $request->validate(
            [
                'quantity' => 'required|numeric|min:1|max:9999999',
                'comment' => 'max:140'
            ]
        , $messages);
        $products = Product::all();
        $product = Product::find($request->id);
        $to_user = User::find($product->user_id);
        $cashback = (int)$request->quantity * (int)$product->price_for_one * ((int)$product->cashback / 100);
        $from_user = User::find(Auth::user()->getAuthIdentifier());
        $from_user_profile = $from_user->profile()->firstOrCreate(['user_id' => $from_user->id]);
        $from_user_balance = $from_user_profile->balance ?? 0;
        $from_user_profile->balance = $from_user_balance + $cashback;
        $from_user_profile->save();
        if ($from_user->referred_by) {
            $affiliate_user = User::find($from_user->referred_by);
            $affiliate_user_profile = $affiliate_user->profile()->firstOrCreate(['user_id' => $affiliate_user->id]);
            $affiliate_user_balance = $affiliate_user_profile->balance ?? 0;
            $referal_reward = (int)$request->quantity *
                (int)$product->price_for_one *
                env('REFERAL_REWARD');
            $affiliate_user_profile->balance = $affiliate_user_balance + $referal_reward;
            $affiliate_user_profile->save();
        }

        $categories = Category::all();
        $order = New Order;
        $order->buyer_id = $from_user->id;
        $order->sale_id = $to_user->id;
        $order->product_name = $product->name;
        $order->product_price = $product->price_for_one;
        $order->product_quantity = $request->quantity;
        $order->sale = $to_user->name ?? 'Пользователь без имени';
        $order->sum = (int)$request->quantity * (int)$product->price_for_one;
        $order->cashback = $cashback;
        $order->referal_reward = $referal_reward ?? '';
        $order->save();
        Notification::send($to_user, new DoOrder($from_user, $to_user, $product, $request->quantity, $request->comment, $order));
        return view('products.index', ['items' => $products, 'categories' => $categories]);
    }

    public function payAccept(Request $request)
    {
        $order = Order::find($request->order_id);
        $buyer = User::find($order->buyer_id);
        $buyer_profile = $buyer->profile()->firstOrCreate(['user_id' => $buyer->id]);
        $buyer_profile->balance = $buyer_profile->balance - $order->cashback;
        $buyer_profile->accepted_balance = $buyer_profile->accepted_balance + $order->cashback;
        $buyer_profile->save();
        $order->status = Order::STATUS_AGREE;
        $order->save();

        if ($buyer->referred_by) {
            $affiliate_user = User::find($buyer->referred_by);
            $affiliate_user_profile = $affiliate_user->profile()->firstOrCreate(['user_id' => $affiliate_user->id]);
            $affiliate_user_profile->balance = $affiliate_user_profile->balance - $order->cashback;
            $affiliate_user_profile->accepted_balance = $affiliate_user_profile->accepted_balance + $order->referal_reward;
            $affiliate_user_profile->save();
        }

        return view('account.pay-accept-success');
    }

    public function sendPayAccept(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = Order::STATUS_WAITING;
        $order->save();

        return view('account.send-pay-accept-success');
    }
}
