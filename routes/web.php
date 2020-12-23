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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/store/product', 'HomeController@store')->name('product.store');
Route::get('/product/detail/{id}', 'HomeController@detail')->name('product.detail');
Route::post('/product/booking/{id}', 'HomeController@booking')->name('product.booking');
Route::get('/get_cart', 'HomeController@getCart')->name('cart');
Route::get('/view_cart', 'HomeController@viewCart')->name('view.cart');
