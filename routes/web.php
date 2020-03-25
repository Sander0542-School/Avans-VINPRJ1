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

Route::post('invoices/{order}/create', 'OrderController@createInvoice')->name('orders.invoices.create');
Route::get('invoices', 'OrderController@invoices')->name('orders.invoices');

Route::resource('orders', 'OrderController');
Route::post('orders/{order}/products', 'OrderController@storeProduct')->name('orders.products.store');
Route::put('orders/{order}/products/{product}', 'OrderController@updateProduct')->name('orders.products.update');
Route::delete('orders/{order}/products/{product}', 'OrderController@destroyProduct')->name('orders.products.destroy');
Route::resource('orders', 'OrderController')->except(['edit', 'update']);

Route::resource('customers', 'CustomerController');

Route::resource('products', 'ProductController')->except(['destroy']);
Route::get('products/{product}/suppliers', 'ProductController@productSuppliers')->name('products.suppliers');
Route::post('products/{product}/addStock', 'ProductController@addStock')->name('products.addStock');