<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// using frontend asset
// Route::get('/', 'MainController@welcome')->name('homepage');
// Route::get('testingone', 'MainController@testing')->name('testingpage');
// Route::get('about', 'MainController@about')->name('aboutpage');
// Route::get('contact', 'MainController@contact')->name('contactpage');

Route::middleware('role:admin')->group(function(){
    // CRUD process (item management)
    Route::resource('brand', 'BrandController');
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubcategoryController');
    Route::resource('item', 'ItemController');
    Route::post('filter', 'ItemController@filterCategory')->name('filterCategory');
});

// frontend with items
Route::get('/', 'FrontendController@home')->name('mainpage');
Route::get('signin', 'FrontendController@signin')->name('signinpage');
Route::get('signup', 'FrontendController@signup')->name('signuppage');
Route::get('cart', 'FrontendController@cart')->name('cartpage');
Route::get('shop', 'FrontendController@shop')->name('shoppage');
Route::get('product', 'FrontendController@product')->name('productpage');
Route::get('discount', 'FrontendController@discount')->name('discountpage');
Route::get('latest', 'FrontendController@latest')->name('latestpage');
Route::get('itemdetail/{id}', 'FrontendController@itemdetail')->name('itemdetail');
Route::get('itemsbysubcategory/{id}', 'FrontendController@itemsbysubcategory')->name('itemsbysubcategory');
Route::get('itemsbybrand/{id}', 'FrontendController@itemsbybrand')->name('itemsbybrand');
Route::resource('order', 'OrderController');
Route::post('datesearch', 'OrderController@datesearch')->name('order.datesearch');
Route::post('confirm/{id}', 'OrderController@confirm')->name('order.confirm');
Route::post('cancel/{id}', 'OrderController@cancel')->name('order.cancel');
Route::post('delivery/{id}', 'OrderController@delivery')->name('order.delivery');

Route::resource('user', 'UserController');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');