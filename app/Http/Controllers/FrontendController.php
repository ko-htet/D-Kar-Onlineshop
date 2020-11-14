<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Subcategory;
use App\Brand;

class FrontendController extends Controller
{
    public function home( $value='' )
    {
        $items = Item::all();
        return view('frontend.mainpage', compact('items'));
    }
    // public function home($value=''){
    //     $items = Item::all(); // Item::take(2)->get(); is only two items show
    //     $brands = Brand::all();
    //     return view('frontend.mainpage', compact('items', 'brands'));
    // }
    public function itemdetail($id){
        $item = Item::find($id);
        return view('frontend.itemdetail', compact('item'));
    }
    public function cart($value=''){
        return view('frontend.cartpage');
    }
    public function signin($value=''){
        return view('frontend.signinpage');
    }
    public function signup($value=''){
        return view('frontend.signuppage');
    }
    public function shop($value=''){
        $items = Item::all();
        return view('frontend.shoppage', compact('items'));
    }
    public function product($value=''){
        $items = Item::all();
        return view('frontend.productpage', compact('items'));
    }
    public function discount($value=''){
        $items = Item::where('discount', '>', 0)->get();
        return view('frontend.discountpage', compact('items'));
    }
    public function latest($value=''){
        $items = Item::orderby('id', 'desc')
                ->take(9)
                ->get();
        return view('frontend.latestpage', compact('items'));
    }
    public function itemsbysubcategory($id){
        $mysubcategory = Subcategory::find($id);
        $mybrand = Brand::find($id);
        return view('frontend.itemsbysubcategory', compact('mysubcategory', 'mybrand'));
    }
    public function itemsbybrand($id){
        $mysubcategory = Subcategory::find($id);
        $mybrand = Brand::find($id);
        return view('frontend.itemsbybrand', compact('mysubcategory', 'mybrand'));
    }
}
