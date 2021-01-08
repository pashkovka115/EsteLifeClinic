<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminActionController extends Controller
{
    public function index()
    {
        $actions = Action::paginate();

        return view('admin.actions.index', ['actions' => $actions]);
    }


    public function create()
    {
        return view('admin.actions.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'nullable|string',
            'slogan' => 'nullable|string',
            'discount' => 'nullable|string',
            'big_img' => 'nullable|image',
            'banner_img' => 'nullable|image',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'start' => 'nullable|date',
            'finish' => 'nullable|date',
        ]);

        $data = $request->except(['_method', '_token', 'img']);
        $folder = date('Y/m/d');

        if ($request->hasFile('big_img')){
            $img = $request->file('big_img')->store("images/actions/$folder");
            $data['big_img'] = $img;
        }
        if ($request->hasFile('banner_img')){
            $img = $request->file('banner_img')->store("images/actions/$folder");
            $data['banner_img'] = $img;
        }
        $action = new Action($data);
        $action->save();

        return redirect()->route('admin.actions.actions.edit', ['action' => $action->id]);
    }


    public function edit($id)
    {
        $action = Action::with('conditions')->where('id', $id)->firstOrFail();

        return view('admin.actions.edit', ['action' => $action]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'nullable|string',
            'slogan' => 'nullable|string',
            'discount' => 'nullable|string',
            'big_img' => 'nullable|image',
            'banner_img' => 'nullable|image',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'start' => 'nullable|date',
            'finish' => 'nullable|date',
        ]);

        $data = $request->except(['_method', '_token', 'img']);
        $folder = date('Y/m/d');
        $action = Action::where('id', $id)->firstOrFail();

        if ($request->hasFile('big_img')){
            $img = $request->file('big_img')->store("images/actions/$folder");
            $data['big_img'] = $img;
            $old_file = storage_path('app/public') . '/' . $action->big_img;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }
        if ($request->hasFile('banner_img')){
            $img = $request->file('banner_img')->store("images/actions/$folder");
            $data['banner_img'] = $img;
            $old_file = storage_path('app/public') . '/' . $action->banner_img;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        $action->update($data);

        return back();
    }


    public function destroy($id)
    {
        $action = Action::with('services')->where('id', $id)->firstOrFail();
        $services = array_keys(Service::all('id')->keyBy('id')->toArray());
        $action->services()->detach($services);

        $old_file = storage_path('app/public') . '/' . $action->big_img;
        if (is_file($old_file)){
            unlink($old_file);
        }
        $old_file = storage_path('app/public') . '/' . $action->banner_img;
        if (is_file($old_file)){
            unlink($old_file);
        }

        $action->delete();

        return back();
    }
}
