<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/test', 'TestController@index');
Route::resource('category', 'CategoryController');
Route::resource('unit', 'UnitController');
Route::resource('product', 'ProductController');
Route::get('product/{id?}/add', 'ProductController@add');
Route::post('product/{id?}/store-in-stock', 'ProductController@storeInStock');
Route::resource('sale', 'SaleController');
Route::get('show-per-unit-price', 'SaleController@perPrice');
Route::get('sale/{id?}/print', 'SaleController@salePrint');
Route::get('sale/{id?}/return', 'SaleController@saleReturn');
Route::get('sale/{id?}/damage', 'SaleController@damage');
Route::resource('customer', 'CustomerController');