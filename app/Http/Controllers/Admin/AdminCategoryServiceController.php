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
        // Тип для первичной выборки
        $type = CatService::select('type')->distinct()->first();
        $categories = CatService::whereNull('parent_id')->where('type', $type->type)->with('children')->get();

        $types = ['cosmetology' => 'Косметология', 'medicine' => 'Медицина'];

        return view('admin.services_cat.create', [
            'categories' => $categories,
            'all_types' => $types,
            'current_type' => $type->type
        ]);
    }


    public function getCategories(Request $request)
    {
        $request->validate([
            'type' => 'required|string'
        ]);
        $type = $request->input('type');

        $cats = CatService::whereNull('parent_id')->where('type', $type)->with('children')->get();

        return json_encode($cats->toArray(), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }


    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:cosmetology,medicine',
            'name' => 'required|string',
            'parent_id' => 'required|nullable|numeric',
//            'description' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'type' => $request->input('type'),
//            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'meta_description' => $request->input('meta_description'),
            'keywords' => $request->input('keywords'),
        ];

        if ((int)$request->input('parent_id') > 0){
            $data['parent_id'] = (int)$request->input('parent_id');
        }else{
            $data['parent_id'] = null;
        }

        if ($request->has('before_after')){
            $data['before_after'] = '1';
        }else{
            $data['before_after'] = '0';
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


    public function edit(Request $request, $id)
    {
        $cat = CatService::where('id', $id)->firstOrFail();
        $categories = CatService::whereNull('parent_id')->where('type', $cat->type)->with('children')->get();

        $types = ['cosmetology' => 'Косметология', 'medicine' => 'Медицина'];

        return view('admin.services_cat.edit', [
            'categories' => $categories,
            'cat' => $cat,
            'all_types' => $types,
            'current_type' => $cat->type
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'parent_id' => 'required|nullable|numeric',
//            'description' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'type' => $request->input('type'),
//            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'meta_description' => $request->input('meta_description'),
            'keywords' => $request->input('keywords'),
        ];
        if ((int)$request->input('parent_id') > 0){
            $data['parent_id'] = (int)$request->input('parent_id');
        }else{
            $data['parent_id'] = null;
        }
        if ($request->has('before_after')){
            $data['before_after'] = '1';
        }else{
            $data['before_after'] = '0';
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
       $cat = CatService::with(['services', 'children', 'appointments'])->where('id', $id)->firstOrFail();

        if ($cat->services()->count() > 0){
            flash('В этой категории есть услуги')->error();
            return back();
        }
        if ($cat->children()->count() > 0){
            flash('В этой категории есть вложенные категории. Ближайшую дочернюю категорию "'.$cat->children[0]->name.'" сделайте "Без родительской"')->error();
            return back();
        }

        $cat->appointments()->delete();

        $cat->delete();

        return back();
    }
}
