<?php

namespace App\Http\Controllers;

use App\Models\Unit;
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

    public function program1()
    {
        return view('program');
    }

    public function program2(Request $request)
    {
//        $step = 5;
//        $p = 1;
//        for($i=1; $i<=20; $i++) {
//            echo $p . '<br>';
//            $p = $p + $step + 1;
//        }
            $unit = new Unit();
            if($unit->id-1 == 24){
                echo $unit->name = 'Null';
            }
        else {


            echo $unit->name = $request->name;
        }
            //$unit->save();


    }
}
