<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    public function index()
    {
        return 'test';
    }

    public function create()
    {
        return view('customer.create');
    }
}
