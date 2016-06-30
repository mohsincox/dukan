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
Route::resource('sale', 'SaleController');
Route::get('show-per-unit-price', 'SaleController@perPrice');