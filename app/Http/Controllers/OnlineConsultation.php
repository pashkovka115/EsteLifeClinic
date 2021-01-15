<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnlineConsultation extends Controller
{
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'nullable|string',
            'phone' => 'required|string',
            'cat_servise_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'doctor_id' => 'required|numeric',
            'date' => 'nullable|string',
            'time' => 'nullable|string',
        ]);
//        dd($request->all());

        $online = new \App\Models\OnlineConsultation($request->except(['_method', '_token']));
        $online->save();

        return back();
    }
}
