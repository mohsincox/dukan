<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Gloudemans\Shoppingcart\Facades\Cart;

class TestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large'])->associate('Product');


        //return view('test');
        return view('cart');
    }
}
