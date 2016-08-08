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
Route::get('/program1', 'TestController@program1');
Route::post('/program2', 'TestController@program2');

Route::resource('category', 'CategoryController');

Route::resource('unit', 'UnitController');

Route::get('product/{id?}/add', 'ProductController@add');
Route::post('product/{id?}/store-in-stock', 'ProductController@storeInStock');
Route::resource('product', 'ProductController');

Route::post('sale/add-to-list', 'SaleController@addToList');
Route::get('sale/remove-list/{rowId}', 'SaleController@removeList');
Route::get('show-customer-balance', 'SaleController@customerBalance');
Route::get('show-per-unit-price', 'SaleController@perPrice');
Route::get('sale/{id?}/print', 'SaleController@salePrint');
Route::get('sale/{id?}/return', 'SaleController@saleReturn');
Route::get('sale/{id?}/damage', 'SaleController@damage');
Route::post('sale/save-cart', 'SaleController@saveCart');
Route::resource('sale', 'SaleController');

Route::resource('customer', 'CustomerController');