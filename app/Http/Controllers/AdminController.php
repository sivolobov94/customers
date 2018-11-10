<?php

namespace App\Http\Controllers;

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

    public function getAdminPage()
    {
        return view('admin.admin');
    }

    public function getUserProfile()
    {
        return view('admin.user');
    }

}
