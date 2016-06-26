<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UnitRequest;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $units = Unit::get();

        return view('unit.index', compact('units'));
    }

    public function create()
    {
        return view('unit.create');
    }

    public function store(UnitRequest $request)
    {
        //dd($requests->name);
        $unit = new Unit();

        $unit->name = $request->name;

        $unit->save();

        flash()->message($unit->name . ' Successfully Created');

        return redirect()->back();

    }

    public function edit($id)
    {
        $unit = Unit::find($id);

        return view('unit.edit', compact('unit'));
    }

    public function update(UnitRequest $request, $id)
    {
        $unit = Unit::find($id);

        $unit->name = $request->name;

        $unit->save();

        flash()->message($unit->name . ' Successfully Updated');

        return redirect('unit');
    }
}
