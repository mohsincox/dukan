<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SaleRequest;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaleController extends Controller
{
    protected $_list = 'list';

    protected $addSaleRules = [
        'product_id' => 'required',
       // 'price' => 'required|numeric',
    ];

    protected $saleRules = [
       //'customer_id' => 'required'
    ];

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
        $addedList = Cart::instance($this->_list)->content();
//dd($addedList);
//        $productId[''] = "SeLect A Pro";
//        $productId = $productId + Product::lists('name', 'id')->toArray();
        $productId = Product::lists('name', 'id');
        $customerId = Customer::lists('name', 'id');

        return view('sale.create', compact('productId', 'customerId', 'addedList'));
    }

    public function addToList( Request $request )
    {
        //return $request->all();
        $this->validate($request, $this->addSaleRules);
        //return $request->all();
        $product = Product::find($request->product_id);

        Cart::instance($this->_list)->add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->input('quantity'),
                'price' => $product->price,
                'options' => ['product_id' => $request->input('product_id')],
            ]);

        return redirect('/sale/create');
    }

    public function removeList($rowId)
    {
        Cart::instance($this->_list)->remove($rowId);
        flash()->warning('One item is removed from List.');

        return redirect()->back();
    }

    public function clearAllLists()
    {
        if (Cart::instance($this->_list)->count() > 0) {
            Cart::instance($this->_list)->destroy();
            flash()->error('All item(s) are removed from List.');
            return redirect()->back();
        }

        flash()->warning('List is already Empty.');
        return redirect()->back();

    }

    public function saveCart(Request $request)
    {
        //return $request->all();
        $this->validate($request, $this->saleRules);
        //$request->total_price = abs($request->price);
        $sale = Sale::create($request->all());
        //return $request->all();

       $cartSales = Cart::instance($this->_list)->content();

        if(count($cartSales)){
            $insData = [];

            foreach ($cartSales as $item) {
                $insData= [
                    'sale_id' => $sale->id,
                    'product_id' => $item->options->product_id,
                    'quantity' => $item->qty,
                    'sub_total'  => $item->subtotal,
                ];

                $saleDetails[] = SaleDetail::create($insData);
            }
        }else{
            flash()->warning('No service has been added to List.');
            return redirect()->back()->withInput();
        }// end of details creating if
        $this->clearAllLists();
        return redirect('sale/voucher-print/'.$sale->id);
    }

    public function voucherPrint(Request $request, $id)
    {
        $sale = Sale::with('customer')->find($id);

        $saleDetails = SaleDetail::with(['product.category', 'product.unit'])
            ->where('sale_id', $sale->id)
            ->get();

        return view('sale.voucher_print', compact('sale', 'saleDetails'));
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
