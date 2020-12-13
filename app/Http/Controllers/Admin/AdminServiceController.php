<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatService;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->paginate();

        return view('admin.services.index', ['services' => $services]);
    }


    public function create()
    {
        $cats = CatService::whereNull('parent_id')->with('children')->get();

        return view('admin.services.create', ['categories' => $cats]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:cosmetology,medicine',
            'name' => 'required|string',
            'price' => 'nullable|numeric',
            'cat_service_id' => 'required|numeric',
            'description' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'img' => 'image',
        ]);

        $data = [
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'cat_service_id' => $request->input('cat_service_id'),
            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'meta_description' => $request->input('meta_description'),
            'keywords' => $request->input('keywords'),
        ];

        if ($request->hasFile('img')) {
            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/categories/$folder");
            $data['img'] = $img;
        }

        $service = new Service($data);
        $service->save();

        return redirect()->route('admin.services.services.edit', ['service' => $service->id]);
    }


    public function edit($id)
    {
        $serv = Service::with('category')->where('id', $id)->firstOrFail();
        $cats = CatService::whereNull('parent_id')->with('children')->get();

        return view('admin.services.edit', ['service' => $serv, 'categories' => $cats]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:cosmetology,medicine',
            'name' => 'required|string',
            'price' => 'nullable|numeric',
            'cat_service_id' => 'required|numeric',
            'description' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'img' => 'image',
        ]);

        $data = [
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'cat_service_id' => $request->input('cat_service_id'),
            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'meta_description' => $request->input('meta_description'),
            'keywords' => $request->input('keywords'),
        ];

        if ($request->hasFile('img')) {
            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/categories/$folder");
            $data['img'] = $img;
        }

        $serv = Service::where('id', $id)->firstOrFail();
        $serv->update($data);

        return back();
    }


    public function destroy($id)
    {
        $serv = Service::with('doctors')->where('id', $id)->firstOrFail();
        $serv->doctors()->detach(array_keys(Doctor::all('id')->keyBy('id')->toArray()));
        $serv->delete();

        return back();
    }
}
