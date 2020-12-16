<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class AdminOptionController extends Controller
{
    public function index()
    {
        $options = Option::paginate(30);

        return view('admin.options.index', ['options' => $options]);
    }


    public function edit($id)
    {
        $op = Option::where('id', $id)->firstOrFail();

        return view('admin.options.edit', ['option' => $op]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'key' => 'required|string',
            'val' => 'required|string',
            'val2' => 'nullable|string'
        ]);

        $op = Option::where('id', $id)->firstOrFail();
        $op->update($request->except(['_method', '_token']));

        return back();
    }
}
