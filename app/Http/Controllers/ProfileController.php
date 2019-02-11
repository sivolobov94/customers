<?php

namespace App\Http\Controllers;

use App\CashbackList;
use App\Category;
use App\CustomOrder;
use App\Order;
use App\Profile;
use App\Regions;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function getProfile()
    {
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->first();
        return view('account.profile', ['profile' => $profile]);
    }

    public function getEditProfile(Request $request)
    {
        $profile = Profile::firstOrCreate(['user_id' => Auth::id()]);
        $categories = Category::all();
        if ($profile->region) {
            $client_ip = request()->ip();
            $client = new Client();
            $response = $client->request('GET',
                sprintf('%s?ip=%s', env('DADATA_URL'), $client_ip),
                ['headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => sprintf('Token %s', env('DADATA_API_KEY'))]]);
            $response = json_decode($response->getBody()->getContents());
            $region = $response->location->unrestricted_value;
            if (!Regions::where('name', $region)->first()) {
                $new_region = new Regions();
                $new_region->name = $region;
                $new_region->save();
            }
            $profile->region = $region;
            $profile->save();
        }
        $regions= Regions::all();
        return view('account.edit-profile', ['profile' => $profile, 'categories' => $categories, 'regions' => $regions]);
    }

    public function getBalance()
    {
        $orders = Order::where('buyer_id', Auth::user()->getAuthIdentifier())->get();
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->first();
        return view('account.balance', ['profile' => $profile, 'orders' => $orders]);
    }

    public function postEditProfile(Request $request)
    {
        $messages = [
            'r_email.email' => 'Поле Email должно быть в формате example@mail.ru',
            'regex' => 'Телефон Должен быть в формате 89998887766',
            'between' => 'Значение кэшбэка должно быть в диапазоне от :min до :max',
            'fax.size' => 'Поле Факс должно не превышать :size символов',
            'r_INN.size' => 'Поле ИНН должно содержать :size символов',
            'r_KPP.size' => 'Поле КПП должно содержать :size символов',
            'r_OGRN.size' => 'Поле OGRN должно содержать :size символов',
            'r_OKPO.size' => 'Поле OKPO должно содержать :size символов',
            'r_OKATO.size' => 'Поле OKATO должно содержать :size символов',
            'r_INN.numeric' => 'Поле ИНН должно быть числом',
            'r_KPP.numeric' => 'Поле КПП должно быть числом',
            'r_OGRN.numeric' => 'Поле OGRN должно быть числом',
            'r_OKPO.numeric' => 'Поле OKPO должно быть числом',
            'r_OKATO.numeric' => 'Поле OKATO должно быть числом',
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
            'r_bank_requisites' => 'Поле Банковские реквизиты не должно превышать 191 символ',
        ];
        $request->validate(
            [
                'name' => 'string|max:191|nullable',
                'company' => 'string|max:1000|nullable',
                'phone' => 'string|max:20|nullable',
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
                'r_phone' => 'string|max:20|nullable',
                'r_fax' => 'string|max:15|nullable',
                'r_INN' => 'numeric|size:10|nullable',
                'r_KPP' => 'numeric|size:9|nullable',
                'r_OGRN' => 'numeric|size:13|nullable',
                'r_OKPO' => 'numeric|size:9|nullable',
                'r_OKATO' => 'numeric|size:11|nullable',
                'r_bank_requisites' => 'string|max:191|nullable',
                'r_cashback' =>'integer|between:1,100|nullable'
            ], $messages);
        request()->session()->put('name');
        request()->session()->put('company');
        request()->session()->put('phone');
        request()->session()->put('region');
        request()->session()->put('address');
        request()->session()->put('small_description');
        request()->session()->put('description');
        request()->session()->put('site');
        request()->session()->put('category');
        request()->session()->put('r_fullname');
        request()->session()->put('r_name');
        request()->session()->put('r_date_create');
        request()->session()->put('r_law_address');
        request()->session()->put('r_post_address');
        request()->session()->put('director');
        request()->session()->put('r_chief_accountant');
        request()->session()->put('r_email');
        request()->session()->put('r_phone');
        request()->session()->put('r_fax');
        request()->session()->put('r_INN');
        request()->session()->put('r_KPP');
        request()->session()->put('r_OGRN');
        request()->session()->put('r_OKPO');
        request()->session()->put('r_OKATO');
        request()->session()->put('r_bank_requisites');
        request()->session()->put('r_cashback');

        $profile = Profile::firstOrCreate(['user_id' => Auth::user()->getAuthIdentifier()]);
        $profile->name = $request->name;
        $profile->email = Auth::user()->toArray()['email'];
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
        return view('account.products', ['products' => $products]);
    }

    public function getNotifications()
    {
        return view('account.notifications');
    }

    public function getOrders()
    {
        $orders = CustomOrder::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('account.orders',['orders' => $orders] );
    }

    public function getOrdersForSale()
    {
        $orders = Order::where('sale_id', Auth::user()->getAuthIdentifier())->get();
        return view('account.orders-sale', ['orders' => $orders]);
    }

    public function getCashbackForm()
    {
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->first();
        return view('cashback.form', ['profile' => $profile]);
    }

    public function postCashbackForm(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->first();
        $request->validate([
            'sum' => "required|numeric|max:{$profile->accepted_balance}"
        ]);
        //dd($profile);
        $cashback_list = new CashbackList();
        $cashback_list->user_id = $profile->user_id;
        $cashback_list->user_name = $profile->user_name ?? 'Имя пользователя не установлено';
        $cashback_list->sum = $request->sum;
        $cashback_list->bank_requisites = $profile->r_bank_requisites ?? 'банковские реквизиты не установлены';
        $cashback_list->email = Auth::user()->toArray()['email'];
        $cashback_list->save();
        $profile->accepted_balance = $profile->accepted_balance - $request->sum;
        $profile->save();
        return view('cashback.success');
    }

    public function getReferal()
    {
        return view('account.referal');
    }
}
