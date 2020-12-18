<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\HistoryWork;
use App\Models\PracticalInterest;
use App\Models\Profession;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminDoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with(['professions', 'services'])->paginate();

        return view('admin.doctors.index', ['doctors' => $doctors]);
    }


    public function create()
    {
        $professions = Profession::all();
        $services = Service::all();

        return view('admin.doctors.create', [
            'professions' => $professions,
            'services' => $services
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'education' => 'nullable|string',
            'add_education' => 'nullable|string',
            'img' => 'nullable|image',

            'ico_*' => 'nullable|image',

            'interest_*' => 'nullable|string',
            'job_position*' => 'nullable|string',
            'job_start_*' => 'nullable|date',
            'job_end_*' => 'nullable|date',
        ]);

        $folder = date('Y/m/d');

        $doctor = [
            'name' => $request->input('name'),
            'education' => $request->input('education'),
            'add_education' => $request->input('add_education'),
        ];

        if ($request->has('level')) {
            $doctor['level'] = '1';
        }else{
            $doctor['level'] = '0';
        }

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("images/$folder");
            $doctor['img'] = $img;
        }

        $db_doctor = Doctor::create($doctor);

        // practical_interests
        $items = [];
        foreach ($request->all() as $field => $value) {
            if (Str::of($field)->startsWith('interest_')) {
                $id_int = (int)explode('_', $field)[1];
                $items[$id_int]['description'] = $value;
            }
            if (Str::of($field)->startsWith('ico_')) {
                $ico = $request->file($field)->store("ico/$folder");
                $id_int = (int)explode('_', $field)[1];
                $items[$id_int]['ico'] = $ico;
            }
        }
        foreach ($items as $id_int => $item) {
            $db_doctor->interests()->create($item);
        }


        // professions
        $id_professions = [];
        foreach ($request->all() as $field => $value) {
            if (Str::of($field)->startsWith('profession_')) {
                $id_prof = explode('_', $field)[1];
                $id_professions[] = (integer)$id_prof;
            }
        }
        $db_doctor->professions()->attach($id_professions);


        // services
        $id_services = [];
        foreach ($request->all() as $field => $value) {
            if (Str::of($field)->startsWith('service_')) {
                $id_serv = explode('_', $field)[1];
                $id_services[] = (integer)$id_serv;
            }
        }
        $db_doctor->services()->attach($id_services);


        // jobs - history_work
        $items_h = [];
        foreach ($request->all() as $field => $value) {
            if (Str::of($field)->startsWith('job_')) {
                $id_int = (int)explode('_', $field)[2];

                if (Str::of($field)->startsWith('job_start_')) {
                    $items_h[$id_int]['start'] = $value;
                } elseif (Str::of($field)->startsWith('job_end_')) {
                    $items_h[$id_int]['end'] = $value;
                } elseif (Str::of($field)->startsWith('job_position_')) {
                    $items_h[$id_int]['position'] = $value;
                } elseif (Str::of($field)->startsWith('job_place_')) {
                    $items_h[$id_int]['place'] = $value;
                }
            }
        }

        foreach ($items_h as $id_int => $item) {
            $item['doctor_id'] = $db_doctor->id;
            $db_doctor->jobs()->create($item);
        }

        return redirect()->route('admin.doctors.doctors.edit', ['doctor' => $db_doctor->id]);
    }


    public function edit($id)
    {
        $doctor = Doctor::with(['professions', 'jobs', 'services', 'interests'])->where('id', $id)->firstOrFail();
        $professions = Profession::all();
        $services = Service::all();

        return view('admin.doctors.edit', [
            'doctor' => $doctor,
            'professions' => $professions,
            'services' => $services
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'education' => 'nullable|string',
            'add_education' => 'nullable|string',
            'img' => 'nullable|image',

            'ico_*' => 'nullable|image',

            'interest_*' => 'nullable|string',
            'job_position*' => 'nullable|string',
            'job_start_*' => 'nullable|date',
            'job_end_*' => 'nullable|date',
        ]);

        $db_doctor = Doctor::with(['professions', 'jobs', 'services', 'interests'])->where('id', $id)->firstOrFail();

        $folder = date('Y/m/d');

        $doctor = [
            'name' => $request->input('name'),
            'education' => $request->input('education'),
            'add_education' => $request->input('add_education'),
        ];

        if ($request->has('level')) {
            $doctor['level'] = '1';
        }else{
            $doctor['level'] = '0';
        }

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("images/doctors/$folder");
            $doctor['img'] = $img;
            $old_file = storage_path('app/public') . '/' . $db_doctor->img;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }
        $db_doctor->update($doctor);


        // practical_interests
        $items = [];
        foreach ($request->all() as $field => $value) {
            if (Str::of($field)->startsWith('interest_')) {
                $id_int = (int)explode('_', $field)[1];
                $items[$id_int]['description'] = $value;
            }
            if (Str::of($field)->startsWith('ico_')) {
                $ico = $request->file($field)->store("ico/$folder");
                $id_int = (int)explode('_', $field)[1];
                $items[$id_int]['ico'] = $ico;
            }
        }
        foreach ($items as $id_int => $item) {
            $db_doctor->interests()->where('id', $id_int)->update($item);
        }


        // professions
        $id_professions = [];
        foreach ($request->all() as $field => $value) {
            if (Str::of($field)->startsWith('profession_')) {
                $id_prof = explode('_', $field)[1];
                $id_professions[] = (integer)$id_prof;
            }
        }
        $ids_profs = array_keys(Profession::all('id')->keyBy('id')->toArray());
        $db_doctor->professions()->detach($ids_profs);
        $db_doctor->professions()->attach($id_professions);


        // services
        $id_services = [];
        foreach ($request->all() as $field => $value) {
            if (Str::of($field)->startsWith('service_')) {
                $id_serv = explode('_', $field)[1];
                $id_services[] = (integer)$id_serv;
            }
        }
        $ids_servs = array_keys(Service::all('id')->keyBy('id')->toArray());
        $db_doctor->services()->detach($ids_servs);
        $db_doctor->services()->attach($id_services);


        // jobs - history_work
        $items_h = [];
        foreach ($request->all() as $field => $value) {
            if (Str::of($field)->startsWith('job_')) {
                $id_int = (int)explode('_', $field)[2];

                if (Str::of($field)->startsWith('job_start_')) {
                    $items_h[$id_int]['start'] = $value;
                } elseif (Str::of($field)->startsWith('job_end_')) {
                    $items_h[$id_int]['end'] = $value;
                } elseif (Str::of($field)->startsWith('job_position_')) {
                    $items_h[$id_int]['position'] = $value;
                } elseif (Str::of($field)->startsWith('job_place_')) {
                    $items_h[$id_int]['place'] = $value;
                }
            }
        }

        $db_doctor->jobs()->where('doctor_id', $id)->delete();
        foreach ($items_h as $id_int => $item) {
            $item['doctor_id'] = $id;
            $db_doctor->jobs()->create($item);
        }


        return back();
    }


    public function destroy($id)
    {
        $db_doctor = Doctor::with(['professions', 'jobs', 'services', 'interests'])->where('id', $id)->firstOrFail();
        $db_doctor->services()->detach(array_keys(Service::all('id')->keyBy('id')->toArray()));
        $db_doctor->professions()->detach(array_keys(Profession::all('id')->keyBy('id')->toArray()));
        $db_doctor->jobs()->where('doctor_id', $id)->delete();
        $db_doctor->interests()->where('doctor_id', $id)->delete();

        $old_file = storage_path('app/public') . '/' . $db_doctor->img;
        if (is_file($old_file)){
            unlink($old_file);
        }

        $db_doctor->delete();

        return back();
    }
}
