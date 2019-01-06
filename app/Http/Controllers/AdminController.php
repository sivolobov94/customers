<?php

namespace App\Http\Controllers;

use App\CashbackList;
use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Метод получения главной страницы авторизации
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getLogin()
    {
        if (session()->get('admin_token')) {
            return redirect()->route('get-admin-page');
        }
        return view('admin.login');
    }

    /**
     * Метод получения и обработки данных авторизации
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        if ($request->input('login') !== env('ADMIN_LOGIN')
            ||
            $request->input('password') !== env('ADMIN_PASSWORD')) {
            return redirect()->back()->with('errors', ['Логин или пароль введены неверно']);
        }
        
        session()->put('admin_token', md5(env('ADMIN_TOKEN')));
        return redirect()->route('get-admin-page');
    }

    /**
     * метод выхода из сервиса
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        session()->forget('admin_token');
        return redirect()->route('admin-get-login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminPage()
    {
        $list = CashbackList::all();
        return view('admin.index', ['list' => $list]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUserProfile()
    {
        return view('admin.user');
    }

    public function getOrdersAccept()
    {
        $orders = Order::where('status', Order::STATUS_WAITING)->get();
        return view('admin.accept-orders', ['orders' => $orders]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getReferalPage()
    {
        return view('admin.referal');
    }

    /**
     * @param Request $request
     */
    public function setReward(Request $request)
    {
        $request->validate([
            'reward' => "integer|min:0|max:1"
        ]);

        $this->reward = $request->reward;
    }
}
