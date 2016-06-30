<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SaleRequest;

class SaleController extends Controller
{
    public function index()
    {
        return 'test';
    }

    public function create()
    {
        $productId = Product::lists('name', 'id');

        return view('sale.create', compact('productId'));
    }

    public function perPrice(Request $request)
    {
        $price = Product::find($request->id);

        return view('sale.price', compact('price'));
    }

    public function store(SaleRequest $request)
    {


        $product = Product::find($request->product_id);
        $totalQuantity = $product->quantity;
        $saleQuantity = $request->quantity;
        $remainQuantity = $totalQuantity - $saleQuantity;

        if($remainQuantity >= 0) {
            $product->update(['quantity' => $remainQuantity]);

            Sale::create($request->all());

            flash()->message('Successfully Sold');

            return redirect()->back();
        }

        flash()->error('There is no sufficient quantity');

        return redirect('sale/create');
    }
}
