<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\CatService;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{
    public function index()
    {
        $appo = Appointment::with(['service', 'cat_servise', 'doctor'])->paginate();

        return view('admin.appointments.index', ['appointments' => $appo]);
    }


    public function create()
    {
        $cats = CatService::all(['id', 'name']);
        $services = Service::all(['id', 'name']);
        $doctors = Doctor::all(['id', 'name']);

        return view('admin.appointments.create', [
            'categories' => $cats,
            'services' => $services,
            'doctors' => $doctors
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'phone' => 'required|string',
            'cat_servise_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'doctor_id' => 'required|numeric',
            'date' => 'nullable|string',
        ]);

        $appo = new Appointment($request->except(['_method', '_token']));
        $appo->save();

        return redirect()->route('admin.home.home.appointments.edit', ['appointment' => $appo->id]);
    }


    public function edit($id)
    {
        $appo = Appointment::with(['service', 'cat_servise', 'doctor'])->where('id', $id)->firstOrFail();

        $cats = CatService::all(['id', 'name']);
        $services = Service::all(['id', 'name']);
        $doctors = Doctor::all(['id', 'name']);

        return view('admin.appointments.edit', [
            'appointment' => $appo,
            'categories' => $cats,
            'services' => $services,
            'doctors' => $doctors
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string',
            'phone' => 'required|string',
            'cat_servise_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'doctor_id' => 'required|numeric',
            'date' => 'nullable|string',
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
