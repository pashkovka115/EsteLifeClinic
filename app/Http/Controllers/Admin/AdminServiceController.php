<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
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
        $serv = Service::with(['category', 'action'])->where('id', $id)->firstOrFail();
        $cats = CatService::whereNull('parent_id')->with('children')->get();
        $actions = Action::all(['id', 'name']);

        return view('admin.services.edit', [
            'service' => $serv,
            'categories' => $cats,
            'actions' => $actions
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:cosmetology,medicine',
            'name' => 'required|string',
            'price' => 'nullable|numeric',
            'cat_service_id' => 'required|numeric',
            'action_id' => 'required|numeric',
            'description' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'img' => 'nullable|image',
            'ico1' => 'nullable|image',
            'ico2' => 'nullable|image',
            'ico3' => 'nullable|image',
            'ico4' => 'nullable|image',
            'service1' => 'nullable|string',
            'service2' => 'nullable|string',
            'service3' => 'nullable|string',
            'service4' => 'nullable|string',
        ]);

        $data = [
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'cat_service_id' => $request->input('cat_service_id'),
            'action_id' => $request->input('action_id'),
            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'meta_description' => $request->input('meta_description'),
            'service1' => $request->input('service1'),
            'service2' => $request->input('service2'),
            'service3' => $request->input('service3'),
            'service4' => $request->input('service4'),
        ];
        if ($data['action_id'] == '0'){
            $data['action_id'] = null;
        }

        $serv = Service::where('id', $id)->firstOrFail();

        if ($request->hasFile('img')) {
            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/services/$folder");
            $data['img'] = $img;
            $old_file = storage_path('app/public') . '/' . $serv->img;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        if ($request->hasFile('ico1')) {
            $folder = date('Y/m/d');
            $img = $request->file('ico1')->store("images/services/$folder");
            $data['ico1'] = $img;
            $old_file = storage_path('app/public') . '/' . $serv->ico1;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        if ($request->hasFile('ico2')) {
            $folder = date('Y/m/d');
            $img = $request->file('ico2')->store("images/services/$folder");
            $data['ico2'] = $img;
            $old_file = storage_path('app/public') . '/' . $serv->ico2;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        if ($request->hasFile('ico3')) {
            $folder = date('Y/m/d');
            $img = $request->file('ico3')->store("images/services/$folder");
            $data['ico3'] = $img;
            $old_file = storage_path('app/public') . '/' . $serv->ico3;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        if ($request->hasFile('ico4')) {
            $folder = date('Y/m/d');
            $img = $request->file('ico4')->store("images/services/$folder");
            $data['ico4'] = $img;
            $old_file = storage_path('app/public') . '/' . $serv->ico4;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        $serv->update($data);

        return back();
    }


    public function destroy($id)
    {
        $serv = Service::with(['doctors', 'appointments'])->where('id', $id)->firstOrFail();
        $serv->doctors()->detach(array_keys(Doctor::all('id')->keyBy('id')->toArray()));
        $serv->appointments()->delete();
        $serv->delete();

        return back();
    }
}
