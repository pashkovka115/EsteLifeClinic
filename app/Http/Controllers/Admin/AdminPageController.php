<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate();

        return view('admin.pages.index', ['pages' => $pages]);
    }


    public function create()
    {
        return view('admin.pages.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'h1' => 'nullable|string',
            'content' => 'nullable|string',
            'title' => 'required|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);

        $data = $request->except(['_method', '_token', 'img']);
        $folder = date('Y/m/d');


        if ($request->hasFile('img')){
            $img = $request->file('img')->store("images/posts/$folder");
            $data['img'] = $img;
        }

        $page = new Page($data);
        $page->save();

        return redirect()->route('admin.pages.pages.edit', ['page' => $page->id]);
    }


    public function edit($id)
    {
        $page = Page::where('id', $id)->firstOrFail();

        return view('admin.pages.edit', ['page' => $page]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'h1' => 'nullable|string',
            'content' => 'nullable|string',
            'title' => 'required|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);

        $data = $request->except(['_method', '_token', 'img']);
        $folder = date('Y/m/d');
        $page = Page::where('id', $id)->firstOrFail();

        if ($request->hasFile('img')){
            $img = $request->file('img')->store("images/posts/$folder");
            $data['img'] = $img;
            $old_file = storage_path('app/public') . '/' . $page->img;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        $page->update($data);

        return back();
    }


    public function destroy($id)
    {
        Page::where('id', $id)->delete();

        return back();
    }
}
