<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public function index()
    {
        $banners = Banner::paginate();

        return view('admin.banners.index', ['banners' => $banners]);
    }


    public function create()
    {
        return view('admin.banners.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'visibility' => 'nullable'
        ]);

        $data['name'] = $request->input('name');
        $data['description'] = $request->input('description');

        if ($request->has('visibility')){
            $data['visibility'] = '1';
        }else{
            $data['visibility'] = '0';
        }

//        dd($data);

        $banner = new Banner($data);
        $banner->save();

        return redirect()->route('admin.options.banners.list.edit', ['banner' => $banner->id]);
    }


    public function edit($id)
    {
        $banner = Banner::where('id', $id)->firstOrFail();

        return view('admin.banners.edit', ['banner' => $banner]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'visibility' => 'nullable'
        ]);

        $data['name'] = $request->input('name');
        $data['description'] = $request->input('description');

        if ($request->has('visibility')){
            $data['visibility'] = '1';
        }else{
            $data['visibility'] = '0';
        }

        $banner = Banner::where('id', $id)->firstOrFail();
        $banner->update($data);

        return redirect()->route('admin.options.banners.list.index');
    }


    public function destroy($id)
    {
        $banner = Banner::with('items')->where('id', $id)->firstOrFail();
        foreach ($banner->items as $item){
            $item->delete();
        }
        $banner->delete();

        return back();
    }
}
