<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     *
     */
    public function getAllCategories()
    {
       return Category::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $categories = new Category();
        $categories->name = $request->name;
        $categories->parent_id = $request->parent_id;
        $categories->link = $request->link;
        $categories->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param Category $categories
     * @return void
     */
    public function show(Category $categories)
    {
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $categories
     * @return void
     */
    public function edit(Category $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Category $categories
     * @return void
     */
    public function update(Request $request, Category $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request)
    {
        Category::destroy($request->id);
    }
}
