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

Route::get('', 'HomeController@index')->name('home.index');

Route::get('orders/invoicing', 'OrderController@invoicing');
Route::resource('orders', 'OrderController');

Route::resource('customers', 'CustomerController');

Route::resource('products', 'ProductController');
