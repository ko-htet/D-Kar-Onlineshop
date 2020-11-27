<?php

namespace App\Http\Controllers;

use App\Item;
use App\Brand;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('item.create', compact('brands', 'subcategories', 'categories'));
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
            "price"=> "required",
            "discount" => "sometimes|required",
            "description" => "required",
            "brand_id"=> "required",
            "subcategory_id"=> "required",
            "photo" => "required|mimes:jpg,jpeg,bmp,png",
        ]);
        
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('item_img', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
        $codeno = 'CN'.time(); // or uniqid();

        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->codeno = $codeno; // or $item->codeno = uniqid();
        $item->photo = $path;
        $item->save();

        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('item.edit', compact('item', 'brands', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            "name" => "required|min:5",
            "price"=> "required",
            "discount" => "sometimes|required",
            "description" => "required",
            "brand_id"=> "required",
            "subcategory_id"=> "required",
            "photo" => "sometimes|required|mimes:jpg,jpeg,bmp,png",
        ]);
        
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('item_img', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }else{
            $path = $request->oldphoto;
        }

        $item->name = $request->name;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->photo = $path;
        $item->save();

        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Storage::delete('storage/app/public/item_img/', $item->name);
        $item->delete();
        return redirect()->route('item.index');
    }
    public function filterCategory(Request $request){
        $cid = $request->cid;
        $subcategories = Subcategory::where('Category_id',$cid)->get();
        return $subcategories;
    }
}
