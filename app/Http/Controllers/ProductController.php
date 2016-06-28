<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::with(['category', 'unit'])->get();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categoryId = Category::lists('name', 'id');

        $unitId = Unit::lists('name', 'id');

        return view('product.create', compact('categoryId', 'unitId'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());

        flash()->message($product->name . ' Successfully Created');

        return redirect()->back();
    }

    public function edit($id)
    {
        $product = Product::find($id);

        $categoryId = Category::lists('name', 'id');

        $unitId = Unit::lists('name', 'id');

        return view('product.edit', compact('product', 'categoryId', 'unitId'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);

        $product->update($request->all());

        flash()->message($product->name . ' Successfully Updated');

        return redirect('product');
    }
}
