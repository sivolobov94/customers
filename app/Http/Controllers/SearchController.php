<?php

namespace App\Http\Controllers;

use App\Category;
use App\CustomOrder;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->input(),
            [
                'text' => 'required'
            ],
            ['required' => 'пожалуйста введите запрос']);

        if ($validator->fails()) {
            return view('products.not-found');
        }
        $items = Product::where('name', 'LIKE', '%' . $request->query('text') . '%')->get();
        if($items->isEmpty()) {
            $items = Product::where('description', 'LIKE', '%' . $request->query('text') . '%')->get();
        }
        if ($items->count() < 1) {
            return view('products.not-found');
        }
        return view('products.search', ['items' => $items]);
    }

    public function customOrderSearch(Request $request)
    {
        $validator = Validator::make($request->input(),
            [
                'text' => 'required'
            ],
            ['required' => 'пожалуйста введите запрос']);

        if ($validator->fails()) {
            return view('custom_order.not-found');
        }
        $items = CustomOrder::where('name', 'LIKE', '%' . $request->query('text') . '%')->get();
        if($items->isEmpty()) {
            $items = CustomOrder::where('description', 'LIKE', '%' . $request->query('text') . '%')->get();
        }
        if ($items->count() < 1) {
            return view('custom_order.not-found');
        }
        return view('custom_order.index', ['custom_orders' => $items]);
    }
}
