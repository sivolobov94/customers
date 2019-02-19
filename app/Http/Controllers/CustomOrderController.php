<?php

namespace App\Http\Controllers;

use App\Category;
use App\CustomOrder;
use App\Notifications\NewOrder;
use App\Profile;
use App\Regions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

class CustomOrderController extends Controller
{
    public function index()
    {
        $custom_orders = CustomOrder::orderBy('created_at', 'desc')->get();
        return view('custom_order.index', ['custom_orders' => $custom_orders]);
    }

    public function getCustomOrderCreate()
    {
        //dd(request()->session()->all());
        request()->session()->put(['redirect' => URL::full()]);
        $categories = Category::all();
        $regions = Regions::all();
        if (auth::user()) {
            $profile = Profile::firstOrCreate(['user_id' => auth::id()]);
            return view('custom_order.create', [
                'categories' => $categories,
                'regions' => $regions,
                'profile' => $profile
            ]);
        }
        $profile = collect();

        return view('custom_order.create', [
            'categories' => $categories,
            'regions' => $regions,
            'profile' => $profile
        ]);
    }

    public function postCustomOrderCreate(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->toArray()['role'] === 'sale') {
                return redirect()
                    ->back()
                    ->withErrors(
                        ['msg' => 'Пользователи являющиеся продавцами не могут создавать заказы']
                    );
            }
        }

        $messages = [
            'name.required' => 'Наименование обязательное поле',
            'description.required' => 'Описание обязательное поле',
            'region.required' => 'Регион обязательное поле',
            'user_name.required' => 'Ваше имя обязательное поле',
            'email.required' => 'Email обязательное поле',
            'phone.required' => 'Телефон обязательное поле',
            'category.required' => 'Категория обязательное поле',

            'name.max' => 'Поле наименование не должно быть больше 191 символов',
            'description.max' => 'Поле Описание не должно быть больше 1000 символов',
            'user_name.max' => 'Поле Ваше имя не должно быть больше 191 символов',
            'email.max' => 'Поле Email не должно быть больше 191 символов',
            'phone.max' => 'Поле телефон не должно быть больше 12 символов',
            'category.max' => 'Поле наименование не должно быть больше 191 символов',

            'email' => 'Поле Email должно быть в формате example@mail.ru',
            'regex' => 'Телефон Должен быть в формате 89998887766',
            'file.max' => 'Файл не должен превышать 20Мб'
        ];
        $request->validate(
            [
                'name' => 'required|string|max:191',
                'description' => 'required|string|max:1000',
                'region' => 'required|string',
                'user_name' => 'required|string|max:191',
                'email' => 'required|email|max:191',
                'phone' => 'required|string|max:16',
                'category' => 'required|string|max:191',
                'file' => 'file|nullable| max:20000'
            ], $messages);

        $user_id = Auth::user();
        if (is_null($user_id)) {
            $user_id = env('GUEST_ID');
        } else {
            $user_id = $user_id->getAuthIdentifier();
        }

        request()->session()->put('name', $request->name);
        request()->session()->put('description', $request->description);
        request()->session()->put('region', $request->region);
        request()->session()->put('user_name', $request->user_name);
        request()->session()->put('email', $request->email);
        request()->session()->put('phone', $request->phone);
        request()->session()->put('category', $request->category);
        if ($request->file) {
            request()->session()->put('file', $request->file->getClientOriginalName());
        }
        //dd(request()->session()->all());
        if (Auth::user()) {
            $order = new CustomOrder();
            $order->name = $request->name;
            $order->user_id = $user_id;
            $order->description = $request->description;
            $order->region = $request->region;
            $order->user_name = $request->user_name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->category = $request->category;

            $file = $request->file('file');
            if ($file) {
                $file->move('custom_orders_files', $file->getClientOriginalName());
                $order->file = $file->getClientOriginalName();
            }

            $order->save();
            //оповестить всех поставщиков выбранной вами категории о вашем новом заказе
            $profiles = Profile::all();
            $filtred_profiles = $profiles->where('category', $order->category);
            $from_user = User::find(Auth::user()->getAuthIdentifier());
            foreach ($filtred_profiles as $profile) {
                $to_user = User::find($profile->user_id);
                Notification::send($to_user, new NewOrder($from_user, $order->id));
            }
            return view('custom_order.success');
        }
        
        return redirect()->route('login');
    }

    public function getCustomOrderEdit($id)
    {
        $custom_order = CustomOrder::find($id);
        $categories = Category::all();
        $regions = Regions::all();
        $user_id = Auth::user();
        if (is_null($user_id)) {
            $profile = new \stdClass();
        } else {
            $profile = Profile::find($user_id->getAuthIdentifier());
        }

        return view('custom_order.edit', [
            'categories' => $categories,
            'regions' => $regions,
            'profile' => $profile,
            'custom_order' => $custom_order
        ]);
    }

    public function postCustomOrderEdit(Request $request)
    {
        if (Auth::user()->toArray()['role'] === 'sale') {
            return redirect()
                ->back()
                ->withErrors(
                    ['msg' => 'Пользователи являющиеся продавцами не могут создавать заказы']
                );
        }

        $messages = [
            'name.required' => 'Наименование обязательное поле',
            'description.required' => 'Описание обязательное поле',
            'region.required' => 'Регион обязательное поле',
            'user_name.required' => 'Ваше имя обязательное поле',
            'email.required' => 'Email обязательное поле',
            'phone.required' => 'Телефон обязательное поле',
            'category.required' => 'Категория обязательное поле',

            'name.max' => 'Поле наименование не должно быть больше 191 символов',
            'description.max' => 'Поле Описание не должно быть больше 1000 символов',
            'user_name.max' => 'Поле Ваше имя не должно быть больше 191 символов',
            'email.max' => 'Поле Email не должно быть больше 191 символов',
            'phone.max' => 'Поле телефон не должно быть больше 12 символов',
            'category.max' => 'Поле наименование не должно быть больше 191 символов',
            'email' => 'Поле Email должно быть в формате example@mail.ru',
            'regex' => 'Телефон Должен быть в формате 89998887766'
        ];
        $request->validate(
            [
                'name' => 'required|string|max:191',
                'description' => 'required|string|max:1000',
                'region' => 'string|required',
                'user_name' => 'required|string|max:191',
                'email' => 'required|email|max:191',
                'phone' => 'required|string|max:20',
                'category' => 'required|string|max:191',
                'file' => 'file|nullable'
            ], $messages);

        $user_id = Auth::user();
        if (is_null($user_id)) {
            $user_id = env('GUEST_ID');
        } else {
            $user_id = $user_id->getAuthIdentifier();
        }
        $order = CustomOrder::find($request->custom_order_id);
        $order->name = $request->name;
        $order->user_id = $user_id;
        $order->description = $request->description;
        $order->region = $request->region;
        $order->user_name = $request->user_name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->category = $request->category;

        $file = $request->file('file');
        if ($file) {
            $file->move('custom_orders_files', $file->getClientOriginalName());
            $order->file = $file->getClientOriginalName();
        }

        $order->save();
        //оповестить всех поставщиков выбранной вами категории о вашем новом заказе
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
