<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Company;
use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    public function edit($id)
    {
        $company = Company::with(['top_sliders', 'middle_sliders', 'bottom_sliders'])->firstOrFail();
        $banners = Banner::all();

        return view('admin.company.edit', ['company' => $company, 'banners' => $banners]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "h1" => "nullable|string",
            "h3" => "nullable|string",
            "practice" => "nullable|string",
            "description" => "nullable|string",
            "service1" => "nullable|string",
            "ico1" => "nullable|image",
            "service2" => "nullable|string",
            "ico2" => "nullable|image",
            "service3" => "nullable|string",
            "ico3" => "nullable|image",
            "service4" => "nullable|string",
            "ico4" => "nullable|image",
            "top_slider" => "required|numeric",
            "middle_slider" => "required|numeric",
            "bottom_slider" => "required|numeric",

        ]);

        $data = [
            "h1" => $request->input('h1'),
            "h3" => $request->input('h3'),
            "practice" => $request->input('practice'),
            "description" => $request->input('description'),
            "service1" => $request->input('service1'),
            "service2" => $request->input('service2'),
            "service3" => $request->input('service3'),
            "service4" => $request->input('service4'),
            "top_slider" => $request->input('top_slider'),
            "middle_slider" => $request->input('middle_slider'),
            "bottom_slider" => $request->input('bottom_slider'),
        ];
        if ($data['top_slider'] == '0'){
            $data['top_slider'] = null;
        }
        if ($data['middle_slider'] == '0'){
            $data['middle_slider'] = null;
        }
        if ($data['bottom_slider'] == '0'){
            $data['bottom_slider'] = null;
        }


        $folder = date('Y/m/d');

        $company = Company::firstOrFail();

        if ($request->hasFile('ico1')) {
            $img = $request->file('ico1')->store("images/company/$folder");
            $data['ico1'] = $img;
            $old_file = storage_path('app/public') . '/' . $company->ico1;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }
        if ($request->hasFile('ico2')) {
            $img = $request->file('ico2')->store("images/company/$folder");
            $data['ico2'] = $img;
            $old_file = storage_path('app/public') . '/' . $company->ico2;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }
        if ($request->hasFile('ico3')) {
            $img = $request->file('ico3')->store("images/company/$folder");
            $data['ico3'] = $img;
            $old_file = storage_path('app/public') . '/' . $company->ico3;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }
        if ($request->hasFile('ico4')) {
            $img = $request->file('ico4')->store("images/company/$folder");
            $data['ico4'] = $img;
            $old_file = storage_path('app/public') . '/' . $company->ico4;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }

        $company->update($data);

        return back();
    }
}