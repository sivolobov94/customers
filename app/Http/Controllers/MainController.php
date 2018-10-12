<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 01.10.2018
 * Time: 14:37
 */

namespace App\Http\Controllers;


use App\Product;

class MainController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return view('main', ['items' => $items]);
    }
}