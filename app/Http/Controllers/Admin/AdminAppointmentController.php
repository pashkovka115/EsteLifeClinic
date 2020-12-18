<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{
    public function index()
    {
        $appo = Appointment::orderBy('created_at', 'DESC')->paginate();

        return view('admin.appointments.index', ['appointments' => $appo]);
    }


    public function create()
    {
        return view('admin.appointments.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'phone' => 'required|string',
            'cat_servise' => 'nullable|string',
            'service' => 'nullable|string',
            'doctor' => 'nullable|string',
            'day' => 'nullable|string',
            'time' => 'nullable|string',
        ]);

        $appo = new Appointment($request->except(['_method', '_token']));
        $appo->save();

        return redirect()->route('admin.home.home.appointments.edit', ['appointment' => $appo->id]);
    }


    public function edit($id)
    {
        $appo = Appointment::where('id', $id)->firstOrFail();

        return view('admin.appointments.edit', ['appointment' => $appo]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string',
            'phone' => 'required|string',
            'cat_servise' => 'nullable|string',
            'service' => 'nullable|string',
            'doctor' => 'nullable|string',
            'day' => 'nullable|string',
            'time' => 'nullable|string',
        ]);

        Appointment::where('id', $id)->update($request->except(['_method', '_token']));

        return back();
    }


    public function destroy($id)
    {
        Appointment::where('id', $id)->delete();

        return back();
    }
}
