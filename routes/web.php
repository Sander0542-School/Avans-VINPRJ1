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

// Home
Route::get('', 'HomeController@index')->name('home.index');

// Invoices
Route::post('invoices/{order}/create', 'OrderController@createInvoice')->name('orders.invoices.create');
Route::get('invoices', 'OrderController@invoices')->name('orders.invoices');

// Orders
Route::prefix('/orders/{order}')->name('orders.')->group(function () {
    Route::post('products', 'OrderController@storeProduct')->name('products.store');
    Route::put('products/{product}', 'OrderController@updateProduct')->name('products.update');
    Route::delete('products/{product}', 'OrderController@destroyProduct')->name('products.destroy');
});

Route::get('orders/warehouse', 'WarehouseController@index')->name('orders.warehouse');

Route::resource('orders', 'OrderController')->except(['edit', 'update']);

Route::prefix('customers/{customer}')->name('customers.')->namespace('Customer')->group(function() {
  Route::resource('address', 'AddressController');
  Route::resource('contacts', 'ContactsController');
});

Route::resource('customers', 'CustomerController');

// Products
Route::prefix('products/{product}')->name('products.')->group(function () {
    Route::get('suppliers', 'ProductController@productSuppliers')->name('suppliers');
    Route::get('link', 'ProductController@link')->name('link');
    Route::post('addStock', 'ProductController@addStock')->name('addStock');
    Route::post('linkSupplier', 'ProductController@linkSupplier')->name('linkSupplier');
});

Route::resource('products', 'ProductController')->except(['destroy']);

// Suppliers
Route::resource('suppliers', 'SupplierController')->only(['index', 'show', 'update']);
