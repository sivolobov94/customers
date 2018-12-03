<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Profile;
use App\Regions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $items = Product::all();
        return view('products.index', ['items' => $items, 'categories' => $categories]);
    }

    public function getProductsForCategory($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $items = Product::where('category', $category->name)->get();
        return view('products.index', ['items' => $items, 'categories' => $categories]);

    }

    public function getProductCreate()
    {
        $categories = Category::all();
        $regions = Regions::all();
        $profile = Profile::where('user_id', Auth::user()->getAuthIdentifier())->first();
        return view('account.create-product', [
            'categories' => $categories,
            'regions' => $regions,
            'profile' => $profile
            ]);
    }

    public function postProductCreate(Request $request)
    {
        $messages = [
            'name.required' => 'Наименование обязательное поле',
            'description.required' => 'Описание обязательное поле',
            'region.required' => 'Регион обязательное поле',
            'category.required' => 'Категория обязательное поле',
            'manufacturer.required' => 'Производитель обязательное поле',
            'measure.required' => 'Единица измерения обязательное поле',
            'price_for_one.required' => 'Цена за единицу обязательное поле',
            'cashback.required' => 'кэшбэк обязательное поле',

            'name.max' => 'Поле наименование не должно быть больше 191 символов',
            'description.max' => 'Поле Описание не должно быть больше 1000 символов',
            'user_name.max' => 'Поле Ваше имя не должно быть больше 191 символов',
            'email.max' => 'Поле Email не должно быть больше 191 символов',
            'phone.max' => 'Поле телефон не должно быть больше 12 символов',
            'category.max' => 'Поле наименование не должно быть больше 191 символов',
        ];
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'description' => 'required|string|max:191',
                'category' => 'required|string|max:191',
                'region' => 'required|string|max:191',
                'manufacturer' => 'required|max:50',
                'measure' => 'required|string|max:20',
                'price_for_one' => 'required|string|max:10',
                'cashback' => 'required|numeric|between:1,100',
            ], $messages);

        $product = new Product();
        $product->user_id = Auth::user()->getAuthIdentifier();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->region = $request->region;
        $product->manufacturer = $request->manufacturer;
        $product->measure = $request->measure;
        $product->price_for_one = $request->price_for_one;
        $product->cashback = $request->cashback;
        $image = $request->file('image');
        if ($image) {
            $image->move('products_images', $image->getClientOriginalName());
            $product->image = 'products_images/'.$image->getClientOriginalName();
        }
        $product->save();
        return view('account.product-success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $product = new Product;
        $product->create([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $request->input('image')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.detail', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->image = '';
        $product->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
