<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:5",
            "category_id" => "required",
        ]);

        $subcategory = new Subcategory;
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        return view('subcategory.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('subcategory.edit', compact('subcategory'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            "name" => "required|min:5",
            "category_id" => "required",
        ]);

        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategory.index');
    }
}
