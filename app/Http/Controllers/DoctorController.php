<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Profession;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with(['professions', 'jobs'])->paginate(12);
        $professions = Profession::all(['name', 'slug']);

        return view('pages.doctors.index', ['doctors' => $doctors, 'professions' => $professions]);
    }


    public function ajax()
    {
        $doctors = Doctor::with(['professions', 'jobs'])->paginate(12);

        return view('pages.doctors.ajax', ['doctors' => $doctors]);
    }


    public function show($slug)
    {
        $doctor = Doctor::with(['professions', 'jobs', 'interests', 'services'])->where('slug', $slug)->firstOrFail();
        $doctor_all = Doctor::with(['professions'])->get();
        $professions = Profession::all(['name', 'slug']);

        return view('pages.doctors.show', ['doctor' => $doctor, 'professions' => $professions, 'doctor_all' => $doctor_all]);
    }
}
