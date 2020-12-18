<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatService;
use App\Models\Doctor;
use App\Models\TreatmentHistory;
use Illuminate\Http\Request;

class BeforeAfterController extends Controller
{
    public function index()
    {
        $ba = TreatmentHistory::with(['doctor', 'category'])->paginate();

        return view('admin.before_after.index', ['items' => $ba]);
    }


    public function create()
    {
        $doctors = Doctor::all(['id', 'name']);
        $categories = CatService::all(['id', 'name']);

        return view('admin.before_after.create', ['doctors' => $doctors, 'categories' => $categories]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|numeric',
            'cat_service_id' => 'required|numeric',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'done' => 'nullable|date'
        ]);

        $data = $request->except(['_method', '_token']);
        $folder = date('Y/m/d');

        if ($request->hasFile('before_images')){
            $img = $request->file('before_images')->store("images/after_befor/$folder");
            $data['before_images'] = $img;
        }
        if ($request->hasFile('after_images')){
            $img = $request->file('after_images')->store("images/after_befor/$folder");
            $data['after_images'] = $img;
        }

        $item = new TreatmentHistory($data);
        $item->save();

        return redirect()->route('admin.before_after.before_after.edit', ['before_after' => $item->id]);
    }


    public function edit($id)
    {
        $item = TreatmentHistory::with(['doctor', 'category'])->where('id', $id)->firstOrFail();
        $doctors = Doctor::all(['id', 'name']);
        $categories = CatService::all(['id', 'name']);

        return view('admin.before_after.edit', ['item' => $item, 'doctors' => $doctors, 'categories' => $categories]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required|numeric',
            'cat_service_id' => 'required|numeric',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'done' => 'nullable|date'
        ]);

        $data = $request->except(['_method', '_token']);
        $folder = date('Y/m/d');

        $item = TreatmentHistory::where('id', $id)->firstOrFail();

        if ($request->hasFile('before_images')){
            $img = $request->file('before_images')->store("images/after_befor/$folder");
            $data['before_images'] = $img;
            $old_file = storage_path('app/public') . '/' . $item->before_images;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }
        if ($request->hasFile('after_images')){
            $img = $request->file('after_images')->store("images/after_befor/$folder");
            $data['after_images'] = $img;
            $old_file = storage_path('app/public') . '/' . $item->after_images;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        $item->update($data);

        return back();
    }


    public function destroy($id)
    {
        TreatmentHistory::where('id', $id)->delete();

        return back();
    }
}