<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // validation
        $request->validate([
            "name" => "required|min:4",
            "photo" => "required|mimes:jpg,jpeg,bmp,png",
        ]);
        
        // if include file, upload
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('brand_img', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }

        // store
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();

        // redirect
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        return view('brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);

        // validation
        $request->validate([
            "name" => "required|min:4",
            "photo" => "sometimes|required|mimes:jpg,jpeg,bmp,png",
            "oldphoto" => "required",
        ]);
        
        // if include file, upload
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('brand_img', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }else{
            $path = $request->oldphoto;
        }

        // store
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();

        // redirect
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brand.index');
    }
}
