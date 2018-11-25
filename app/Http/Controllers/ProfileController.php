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
        $messages = [

            'r_email.email' => 'Поле Email должно быть в формате example@mail.ru',
            'regex' => 'Телефон Должен быть в формате +79998887766',
            'between' => 'Значение кэшбэка должно быть в диапазоне от :min до :max',
            'fax.size' => 'Поле Факс должно не превышать :size символов',
            'r_INN.size' => 'Поле ИНН должно содержать :size символов',
            'r_KPP.size' => 'Поле КПП должно содержать :size символов',
            'r_OGRN.size' => 'Поле OGRN должно содержать :size символов',
            'r_OKPO.size' => 'Поле OKPO должно содержать :size символов',
            'r_OKATO.size' => 'Поле OKATO должно содержать :size символов',
            'r_cashback.integer' => 'Поле кэшбэк должно быть числом',


            'name' => 'Поле Имя не должно превышать 191 символ',
            'company' => 'Поле Название компании не должно превышать 191 символ',
            'phone' => 'Поле Телефон не должно превышать 191 символ',
            'region' => 'Поле Регион не должно превышать 191 символ',
            'address' => 'Поле Адрес не должно превышать 191 символ',
            'small_description' => 'Поле Краткое описание не должно превышать 191 символ',
            'description' => 'Поле Описание не должно превышать 1000 символов',
            'site' => 'Поле Сайт не должно превышать 191 символ',
            'category' => 'Поле Категория не должно превышать 191 символ',
            'r_fullname' => 'Поле Полное наименоание предприятия не должно превышать 191 символ',
            'r_name' => 'Поле Сокращенное название предприятия не должно превышать 191 символ',
            'r_date_create' => 'Поле Дата создания не должно превышать 191 символ',
            'r_law_address' => 'Поле Юридический адрес не должно превышать 191 символ',
            'r_post_address' => 'Поле Почтовый адрес не должно превышать 191 символ',
            'r_director' => 'Поле Директор не должно превышать 191 символ',
            'r_chief_accountant' => 'Поле Главный бухгалтер не должно превышать 191 символ',
            'r_email' => 'Поле Email не должно превышать 191 символ',
            'r_phone' => 'Поле Телефон не должно превышать 191 символ',
            'r_fax' => 'Поле Факс не должно превышать 15 символ',
            'r_INN' => 'Поле ИНН не должно превышать 15 символ',
            'r_KPP' => 'Поле КПП не должно превышать 15 символ',
            'r_OGRN' => 'Поле ОГРН не должно превышать 15 символ',
            'r_OKPO' => 'Поле ОКПО не должно превышать 15 символ',
            'r_OKATO' => 'Поле ОКАТО не должно превышать 15 символ',
            'r_bank_requisites' => 'Поле Банковские реквизиты не должно превышать 15 символ',
        ];
        $request->validate(
            [
                'name' => 'string|max:191|nullable',
                'company' => 'string|max:1000|nullable',
                'phone' => 'string|regex:/^(\+7|8)[0-9]{10}$/|max:12|nullable',
                'region' => 'string|max:191|nullable',
                'address' => 'max:191|nullable',
                'small_description' => 'string||max:191|nullable',
                'description' => 'string|max:1000|nullable',
                'site' => 'string|max:191|nullable',
                'category' => 'string|max:191|nullable',
                'r_fullname' => 'string|max:191|nullable',
                'r_name' => 'string|max:191|nullable',
                'r_date_create' => 'string|max:191|nullable',
                'r_law_address' => 'string|max:191|nullable',
                'r_post_address' => 'string|max:191|nullable',
                'r_director' => 'string|max:191|nullable',
                'r_chief_accountant' => 'string|max:191|nullable',
                'r_email' => 'string|email|max:191|nullable',
                'r_phone' => 'string|regex:/^(\+7|8)[0-9]{10}$/|max:12|max:191|nullable',
                'r_fax' => 'string|max:15|nullable',
                'r_INN' => 'string|size:10|nullable',
                'r_KPP' => 'string|size:9|nullable',
                'r_OGRN' => 'string|size:13|nullable',
                'r_OKPO' => 'string|size:9|nullable',
                'r_OKATO' => 'string|size:11|nullable',
                'r_bank_requisites' => 'string|max:191|nullable',
                'r_cashback' =>'integer|between:1,100|nullable'
            ], $messages);

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
        if ($logo) {
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

    public function getReferal()
    {
        return view('account.referal');
    }
}
