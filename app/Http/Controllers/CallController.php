<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|regex:/[+()\d-]/'
        ]);

        $call = new Call([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
        ]);
        $call->save();

        return back();
    }
}
