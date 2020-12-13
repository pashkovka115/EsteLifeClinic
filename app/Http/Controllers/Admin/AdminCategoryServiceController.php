<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatService;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminCategoryServiceController extends Controller
{
    public function index()
    {
        $cats = CatService::paginate();

        return view('admin.services_cat.index', ['cats' => $cats]);
    }


    public function create()
    {
        $categories = CatService::whereNull('parent_id')->with('children')->get();

        return view('admin.services_cat.create', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'parent_id' => 'required|nullable|numeric',
            'description' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'meta_description' => $request->input('meta_description'),
            'keywords' => $request->input('keywords'),
        ];

        if ((int)$request->input('parent_id') > 0){
            $data['parent_id'] = (int)$request->input('parent_id');
        }else{
            $data['parent_id'] = null;
        }

        $folder = date('Y/m/d');

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("images/categories/$folder");
            $data['img'] = $img;
        }

        $cat = new CatService($data);
        $cat->save();

        return redirect()->route('admin.services.categories.edit', ['category' => $cat->id]);
    }


    public function edit($id)
    {
        $cat = CatService::where('id', $id)->firstOrFail();
        $categories = CatService::whereNull('parent_id')->with('children')->get();

        return view('admin.services_cat.edit', ['cat' => $cat, 'categories' => $categories]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'parent_id' => 'required|nullable|numeric',
            'description' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'meta_description' => $request->input('meta_description'),
            'keywords' => $request->input('keywords'),
        ];
        if ((int)$request->input('parent_id') > 0){
            $data['parent_id'] = (int)$request->input('parent_id');
        }else{
            $data['parent_id'] = null;
        }


        $folder = date('Y/m/d');

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("images/categories/$folder");
            $data['img'] = $img;
        }

        $cat = CatService::where('id', $id)->firstOrFail();
        $cat->update($data);

        return back();
    }


    public function destroy($id)
    {
       $cat = CatService::with(['services', 'children'])->where('id', $id)->firstOrFail();
        if ($cat->services()->count() > 0){
            flash('В этой категории есть услуги')->error();
            return back();
        }
        if ($cat->children()->count() > 0){
            flash('В этой категории есть вложенные категории. Ближайшую дочернюю категорию сделайте "Без родительской"')->error();
            return back();
        }

        $cat->delete();

        return back();
    }
}
