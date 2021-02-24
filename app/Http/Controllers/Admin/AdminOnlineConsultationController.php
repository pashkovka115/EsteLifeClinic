<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatService;
use App\Models\Doctor;
use App\Models\OnlineConsultation;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminOnlineConsultationController extends Controller
{
    public function index()
    {
        $online = OnlineConsultation::paginate();

        return view('admin.online_consultation.index', ['onlines' => $online]);
    }


    public function create()
    {
        $cats = CatService::all(['id', 'name']);
        $services = Service::all(['id', 'name']);
        $doctors = Doctor::all(['id', 'name']);

        return view('admin.online_consultation.create', [
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

        $online = new OnlineConsultation($request->except(['_method', '_token']));
        $online->save();

        return redirect()->route('admin.home.home.online.edit', ['online' => $online->id]);
    }


    public function edit($id)
    {
        $online = OnlineConsultation::with(['service', 'cat_servise', 'doctor'])->where('id', $id)->firstOrFail();

        $cats = CatService::all(['id', 'name']);
        $services = Service::all(['id', 'name']);
        $doctors = Doctor::all(['id', 'name']);

        return view('admin.online_consultation.edit', [
            'online' => $online,
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

        OnlineConsultation::where('id', $id)->update($request->except(['_method', '_token']));

        return redirect()->route('admin.home.home.online.index');
    }


    public function destroy($id)
    {
        OnlineConsultation::where('id', $id)->delete();

        return back();
    }
}
