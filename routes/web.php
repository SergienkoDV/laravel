<?php

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

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $products = DB::table('products')->get();
    return view('grid', compact('products'));
});

Route::get('/grid', function () {
    $products = DB::table('products')->get();
    return view('grid', compact('products'));
});

Route::get('/product/{id}', function ($id) {
    $product = DB::table('products')->find($id);
    return view('productcart', compact('product'));
});

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/orders', function () {
//    $orders = DB::table('orders')->get();
//    return view('orders', compact('orders'));
//});

Route::resource('orders', 'OrdersController');

Route::resource('positions', 'PositionsController');

Route::get('/positions/create/{id}', 'PositionsController@create')->name('positioncreate');

Route::get('/positions/plus/{id}', 'PositionsController@plus')->name('totalplus');

Route::get('/positions/minus/{id}', 'PositionsController@minus')->name('totalminus');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
