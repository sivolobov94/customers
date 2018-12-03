<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Category;
use App\CustomOrder;
use App\Notifications\NewOrder;
use App\Profile;
use App\Regions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CustomOrderController extends Controller
{
    public function index()
    {
        $custom_orders = CustomOrder::all();
        return view('custom_order.index', ['custom_orders' => $custom_orders]);
    }

    public function getCustomOrderCreate()
    {
        $categories = Category::all();
        $regions = Regions::all();
        $profile = Profile::find(Auth::user()->getAuthIdentifier());

        return view('custom_order.create', [
            'categories' => $categories,
            'regions' => $regions,
            'profile' => $profile
        ]);

    }

    public function postCustomOrderCreate(Request $request)
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
                'phone' => ['required', 'string', 'regex:/^8[0-9]{10}$/', 'max:12'],
                'category' => 'required|string|max:191',
                'file' => 'file|nullable'
            ], $messages);

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
