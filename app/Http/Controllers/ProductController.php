<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Product;
use App\Regions;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::where(['reserved' => false])->get();
        return view('products.index', ['items' => $items]);
    }

    public function getProductCreate()
    {
        $categories = Categories::all();
        $regions = Regions::all();
        //dd($regions, $categories);
        return view('account.create-product', ['categories' => $categories, 'regions' => $regions]);
    }

    public function postProductCreate(Request $request)
    {
        //dd($request->file());
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
        if ($image->isValid()) {
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
