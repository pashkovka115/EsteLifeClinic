<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Profession;
use Illuminate\Http\Request;

class AdminProfessionController extends Controller
{
    public function index()
    {
        $professions = Profession::paginate();

        return view('admin.professions.index', ['professions' => $professions]);
    }


    public function create()
    {
        return view('admin.professions.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $prof = new Profession();
        $prof->name = $request->input('name');
        $prof->save();

        return redirect()->route('admin.doctors.professions.edit', ['profession' => $prof->id]);
    }


    public function edit($id)
    {
        $prof = Profession::where('id', $id)->firstOrFail();

        return view('admin.professions.edit', ['profession' => $prof]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Profession::where('id', $id)->update(['name' => $request->input('name')]);

        return back();
    }


    public function destroy($id)
    {
        $prof = Profession::with('doctors')->where('id', $id)->firstOrFail();

        if ($prof){
            $prof->doctors()->detach(array_keys(Doctor::all('id')->keyBy('id')->toArray()));
            $prof->delete();
        }

        return back();
    }
}
