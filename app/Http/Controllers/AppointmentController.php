<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|regex:/[+()\d-]/',
            'cat_servise_id' => 'nullable|numeric',
            'service_id' => 'nullable|numeric',
            'doctor_id' => 'nullable|numeric',
            'data' => 'nullable|string'
        ]);

        $call = new Appointment($request->except('_token'));
        $call->save();

        return back();
    }
}
