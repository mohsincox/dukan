<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::get();

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(CustomerRequest $request)
    {
        $customer = Customer::create($request->all());

        flash()->success($customer->name.' Successfully Created');

        return redirect()->back();
    }

    public function edit($id)
    {
       $customer = Customer::find($id);

        return view('customer.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());

        flash()->success($customer->name.' Successfully Updated');

        return redirect('customer');
    }
}
