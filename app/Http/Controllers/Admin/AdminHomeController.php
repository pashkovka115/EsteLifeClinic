<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Home;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function edit()
    {
        $home = Home::with([
            'top_sliders',
            'useful_tips',
//            'action_sliders',
            'medical_center_sliders'
        ])->first();

        $all_banners = Banner::all();

        return view('admin.home.edit', ['home' => $home, 'all_banners' => $all_banners]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'top_slider' => 'nullable|numeric',
            'two_slider' => 'nullable|numeric',
            'action_slider' => 'nullable|numeric',
            'medical_center_slider' => 'nullable|numeric',
            'count_doctors_list' => 'nullable|numeric',
            'count_news' => 'nullable|numeric',
        ]);
//        dd($request->all());
//
        $home = Home::firstOrFail();
        $home->update($request->except(['_token', '_method']));
//dd($home);
        return back();
    }


    public function destroy($id)
    {
        //
    }
}
