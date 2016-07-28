<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SaleRequest;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = Sale::with(['product.category', 'product.unit', 'customer'])->get();

        return view('sale.index', compact('sales'));
    }

    public function create()
    {
        $productId = Product::lists('name', 'id');
        $customerId = Customer::lists('name', 'id');

        return view('sale.create', compact('productId', 'customerId'));
    }

    public function customerBalance(Request $request)
    {
        $customer = Customer::find($request->id);

        return view('sale.balance', compact('customer'));
    }

    public function perPrice(Request $request)
    {
        $price = Product::find($request->id);

        return view('sale.price', compact('price'));
    }

    public function store(SaleRequest $request)
    {
        $customer = Customer::find($request->customer_id);
        $previousBalance = $customer->balance;
        $cashPaid = $request->cash;
        $remainBalance = $previousBalance - $cashPaid;
        //return $previousBalance;

        $product = Product::find($request->product_id);
        $totalQuantity = $product->quantity;
        $saleQuantity = $request->quantity;
        $remainQuantity = $totalQuantity - $saleQuantity;

        if($remainQuantity >= 0) {
            $customer->update(['balance' => $remainBalance]);

            $product->update(['quantity' => $remainQuantity]);

            Sale::create($request->all());

            flash()->message('Successfully Sold');

            return redirect()->back();
        }

        flash()->error('There is no sufficient quantity');

        return redirect('sale/create');
    }

    public function salePrint($id)
    {
        $sale = Sale::with(['product.category', 'product.unit'])->find($id);

        return view('sale.print', compact('sale'));
    }

    public function saleReturn($id)
    {
        $sale = Sale::with(['product'])->find($id);
        $saleQuantity = $sale->quantity;
        $stockQuantity = $sale->product->quantity;
        $fine = ($sale->price * 10)/100;
        $returnBalance = $sale->cash - $fine;
        $sale->update([
            'quantity' => $sale->quantity - $saleQuantity,
            'price' => $sale->price,
            'cash' => $fine,
        ]);

        $product = Product::find($sale->product_id);
        $product->update(['quantity' => $saleQuantity + $stockQuantity]);

        $customer = Customer::find($sale->customer_id);
        $remainBalance = $customer->balance;
        $customer->update(['balance' => $remainBalance + $returnBalance]);

        return redirect('sale');
    }

    public function damage($id)
    {
//        $sale = Sale::find($id);
//        $sale->update([
//            'price' => 0
//        ]);
//
//        return redirect('sale');
        $sale = Sale::find($id);
        $cash = $sale->cash;
        $customer = Customer::find($sale->customer_id);
        $customer->update(['balance' => $customer->balance + $cash]);
        $sale->delete();
    }
}
