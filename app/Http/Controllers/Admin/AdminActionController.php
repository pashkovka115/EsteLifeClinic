<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\ActionService;
use App\Models\CatService;
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
        $action = Action::with(['conditions', 'services'])->where('id', $id)->firstOrFail();
        // На фронте первой показана медицина
        $cats_services = CatService::with('services')
            ->where('type', 'medicine')
            ->get(['id', 'name']);

        return view('admin.actions.edit', ['action' => $action, 'categories' => $cats_services]);
    }


    public function getCatsWithServicesAjax(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string'
        ]);

        $cats_services = CatService::with('services')
            ->where('type', $data['type'])
            ->get(['id', 'name']);

        return json_encode($cats_services->toArray(), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }


    public function addTieService(Request $request)
    {
        $data = $request->validate([
            'action_id' => 'required|numeric',
            'service_id' => 'required|numeric',
        ]);

        $tie = ActionService::where('action_id', $data['action_id'])
            ->where('service_id', $data['service_id'])
            ->first();
        if (!$tie){
            $action = Action::with('services')->where('id', $data['action_id'])->firstOrFail();
            $action->services()->attach($data['service_id']);
        }else{
            flash('Связь уже существует')->error();
        }

        return back();
    }


    public function destroyTieService(Request $request)
    {
        $data = $request->validate([
            'action_id' => 'required|numeric',
            'service_id' => 'required|numeric',
        ]);

        $action = Action::with('services')->where('id', $data['action_id'])->firstOrFail();
        $action->services()->detach($data['service_id']);

        return back();
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
//        dd($action);
        if (!is_null($action->services) and $action->services->count() > 0){
            return back()->withErrors('Эту акцию нельзя удалить, она участвует в ' . $action->services->count() . 'услугах');
        }

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
