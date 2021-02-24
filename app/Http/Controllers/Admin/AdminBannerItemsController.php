<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerItems;
use Illuminate\Http\Request;

class AdminBannerItemsController extends Controller
{
    public function index($id)
    {
        $items = BannerItems::where('banner_id', $id)->get();
        $banner = Banner::where('id', $id)->firstOrFail();

        return view('admin.banner_items.index', ['items' => $items, 'banner' => $banner]);
    }


    public function create($banner_id)
    {
        $banner = Banner::where('id', $banner_id)->firstOrFail();

        return view('admin.banner_items.create', ['banner' => $banner]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'banner_id' => 'required|numeric',
            'visibility' => 'nullable',
            'title' => 'nullable|string',
            'img' => 'nullable|image',
            'description' => 'nullable|string',
        ]);

        $data = $request->except(['_token', 'visibility', 'img']);

        if ($request->hasFile('img')) {
            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/banners/$folder");
            $data['img'] = $img;
        }
        if ($request->has('visibility')){
            $data['visibility'] = '1';
        }else{
            $data['visibility'] = '0';
        }

        $item = new BannerItems($data);
        $item->save();

        return redirect()->route('admin.options.banners.banner.item.edit', ['id' => $item->id]);
    }


    public function edit($id)
    {
        $item = BannerItems::with('banner')->where('id', $id)->firstOrFail();

        return view('admin.banner_items.edit', ['item' => $item]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'banner_id' => 'required|numeric',
            'title' => 'nullable|string',
            'img' => 'nullable|image',
            'description' => 'nullable|string',
            'extra' => 'nullable|string',
        ]);

        $data = [
            'banner_id' => $request->input('banner_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'extra' => $request->input('extra'),
        ];

        $item = BannerItems::where('id', $id)->firstOrFail();

        $folder = date('Y/m/d');

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("images/banners/$folder");
            $data['img'] = $img;
            $old_file = storage_path('app/public') . '/' . $item->img;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }

        if ($request->has('delete_img')) {
            $data['img'] = null;
            $old_file = storage_path('app/public') . '/' . $item->img;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }
        if ($request->has('visibility')){
            $data['visibility'] = '1';
        }else{
            $data['visibility'] = '0';
        }

        $item->update($data);

        return redirect()->route('admin.options.banners.banner.items', ['id' => $data['banner_id']]);
    }


    public function destroy($id)
    {
        BannerItems::where('id', $id)->delete();

        return back();
    }
}
