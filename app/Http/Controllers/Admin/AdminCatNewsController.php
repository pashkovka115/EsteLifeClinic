<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatPost;
use Illuminate\Http\Request;

class AdminCatNewsController extends Controller
{
    public function index()
    {
        $cats = CatPost::paginate();

        return view('admin.news_cat.index', ['categories' => $cats]);
    }


    public function create()
    {
        return view('admin.news_cat.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'meta_description' => 'nullable|string',
            'title' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);

        $cat = new CatPost($request->except(['_method', '_token']));
        $cat->save();

        return redirect()->route('admin.pages.category.news.edit', ['news' => $cat->id]);
    }


    public function edit($id)
    {
        $cat = CatPost::where('id', $id)->firstOrFail();

        return view('admin.news_cat.edit', ['category' => $cat]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'meta_description' => 'nullable|string',
            'title' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);

        CatPost::where('id', $id)->update($request->except(['_method', '_token']));

        return back();
    }


    public function destroy($id)
    {
        $cat = CatPost::with('posts')->where('id', $id)->firstOrFail();
        if ($cat->posts->count() > 0){
            flash('В этой категории есть новости.');
            return back();
        }

        $cat->delete();

        return back();
    }
}
