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
            'img' => 'nullable|image',
            'description' => 'nullable|string',
            'start' => 'nullable|date',
            'finish' => 'nullable|date',
        ]);

        $data = $request->except(['_method', '_token', 'img']);
        $folder = date('Y/m/d');

        if ($request->hasFile('img')){
            $img = $request->file('img')->store("images/actions/$folder");
            $data['img'] = $img;
        }
        $action = new Action($data);
        $action->save();

        return redirect()->route('admin.actions.actions.edit', ['action' => $action->id]);
    }


    public function edit($id)
    {
        $action = Action::where('id', $id)->firstOrFail();

        return view('admin.actions.edit', ['action' => $action]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'nullable|string',
            'slogan' => 'nullable|string',
            'discount' => 'nullable|string',
            'img' => 'nullable|image',
            'description' => 'nullable|string',
            'start' => 'nullable|date',
            'finish' => 'nullable|date',
        ]);

        $data = $request->except(['_method', '_token', 'img']);
        $folder = date('Y/m/d');
        $action = Action::where('id', $id)->firstOrFail();

        if ($request->hasFile('img')){
            $img = $request->file('img')->store("images/actions/$folder");
            $data['img'] = $img;
            $old_file = storage_path('app/public') . '/' . $action->img;
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

        $old_file = storage_path('app/public') . '/' . $action->img;
        if (is_file($old_file)){
            unlink($old_file);
        }

        $action->delete();

        return back();
    }
}
