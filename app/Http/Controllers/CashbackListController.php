<?php

namespace App\Http\Controllers;

use App\CashbackList;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashbackListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = CashbackList::all();
        return view('admin.cashback-list', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\CashbackList  $cashbackList
     * @return \Illuminate\Http\Response
     */
    public function show(CashbackList $cashbackList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CashbackList  $cashbackList
     * @return \Illuminate\Http\Response
     */
    public function edit(CashbackList $cashbackList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CashbackList  $cashbackList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashbackList $cashbackList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CashbackList  $cashbackList
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashbackList $cashbackList)
    {
        //
    }
}
