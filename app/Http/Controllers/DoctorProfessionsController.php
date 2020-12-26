<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Profession;
use Illuminate\Http\Request;

class DoctorProfessionsController extends Controller
{
    public function index($slug)
    {
        $doctors = Doctor::with(['professions', 'jobs'])->whereHas('professions', function ($q) use ($slug){
            $q->where('slug', $slug);
        })->paginate(12);


        $professions = Profession::all(['name', 'slug']);

        return view('pages.doctors.index', ['doctors' => $doctors, 'professions' => $professions, 'slug' => $slug]);
    }


    public function ajax($slug)
    {
        $doctors = Doctor::with(['professions', 'jobs'])->whereHas('professions', function ($q) use ($slug){
            $q->where('slug', $slug);
        })->paginate(12);

        return view('pages.doctors.ajax', ['doctors' => $doctors, 'slug' => $slug]);
    }
}
