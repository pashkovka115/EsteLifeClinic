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
        return view('admin.services_cat.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
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

        return view('admin.services_cat.edit', ['cat' => $cat]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
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
       $cat = CatService::with('services')->where('id', $id)->firstOrFail();
        if ($cat->services()->count() > 0){
            flash('В этой категории есть услуги')->error();
            return back();
        }

        $cat->delete();

        return back();
    }
}
