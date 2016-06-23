<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return "testing";
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        echo  $request->name;
        //$category = Category::create($request->all());
    }
}
