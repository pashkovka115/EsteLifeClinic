<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Banner;
use App\Models\BannerItems;
use App\Models\Home;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function edit()
    {
        $home = Home::with([
//            'top_sliders',
            'useful_tips',
//            'action_sliders',
//            'medical_center_sliders'
        ])->first();

        $all_banners = Banner::all();

        $banner_home_top = BannerItems::where('code_banner', 'home_top')->get();
        $actions = Action::all(['id', 'name', 'banner_img', 'show_home']);
        $about_us_slider = BannerItems::with('banner')
            ->where('code_banner', 'home_about_us')
            ->get();
        $about_us_description = BannerItems::where('code_banner', 'general_home_about_us')->first();

        return view('admin.home.edit', [
            'home' => $home,
            'all_banners' => $all_banners,
            'banner_home_top' => $banner_home_top ?? [],
            'actions' => $actions,
            'about_us_slider' => $about_us_slider,
            'about_us_description' => $about_us_description
        ]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'two_slider' => 'nullable|numeric',
            'action_slider' => 'nullable|numeric',
            'medical_center_slider' => 'nullable|numeric',
            'count_doctors_list' => 'nullable|numeric',
            'count_news' => 'nullable|numeric',
        ]);

        $data = $request->except(['_token', '_method']);

        if ($data['two_slider'] == '0'){
            $data['two_slider'] = null;
        }
        /*if ($data['medical_center_slider'] == '0'){
            $data['medical_center_slider'] = null;
        }*/

        $home = Home::firstOrFail();
        $home->update($data);

        return back();
    }


    public function bannerItemUpdate(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'id' => 'required|numeric',
            'full_description' => 'nullable|string'
        ]);

        $item = BannerItems::with('banner')->where('id', $data['id'])->firstOrFail();

        if ($request->hasFile('img')){

            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/banners/$folder");
            $data['img'] = $img;

            $old_file = storage_path('app/public') . '/' . $item->img;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        $item->update($data);

        return redirect()->route('admin.pages.home.edit');
    }


    public function bannerItemStore(Request $request)
    {
        $data = $request->validate([
            'code_banner' => 'required|string',
            'title' => 'nullable|string'
        ]);

        if ($request->hasFile('img')){
            $item = new BannerItems();

            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/banners/$folder");

            if (isset($data['title'])){
                $item->title = $data['title'];
            }

            $item->code_banner = $data['code_banner'];
            $item->img = $img;
            $item->save();
        }

        return redirect()->route('admin.pages.home.edit');
    }

    public function bannerItemDestroy(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|numeric'
        ]);

        $item = BannerItems::where('id', $data['id'])->firstOrFail();
        $old_file = storage_path('app/public') . '/' . $item->img;
        if (is_file($old_file)) {
            unlink($old_file);
        }

//        $items = BannerItems::with('banner')->where('banner_id', $item->banner_id)->get();

        $item->delete();

//        dd($item);
        /*dd($items);

        if ($items->count() == 1){
            dd($items);
        }*/

        return back();
    }

    public function bannerTopEdit($id)
    {
        $item = BannerItems::where('id', $id)->firstOrFail();

        return view('admin.home.banners.top.edit', ['item' => $item]);
    }


    /*public function bannerTopStore(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|numeric'
        ]);

        $item = BannerItems::where('id', $data['id'])->firstOrFail();
        $old_file = storage_path('app/public') . '/' . $item->img;
        if (is_file($old_file)) {
            unlink($old_file);
        }
        $item->delete();

        return back();
    }*/


    public function destroy($id)
    {
        //
    }
}
