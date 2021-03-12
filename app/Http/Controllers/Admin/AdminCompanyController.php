<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerItems;
use App\Models\Company;
use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    public function edit($id)
    {
        $company = Company::firstOrFail();
//        $banners = Banner::all();

        $banner_top = BannerItems::where('code_banner', 'about_company_top')->get();
        $banner_two = BannerItems::where('code_banner', 'about_company_two')->get();
        $banner_two_text = BannerItems::where('code_banner', 'about_company_two_text')->first();
        $banner_certificates = BannerItems::where('code_banner', 'about_company_certificates')->get();
//        dd($banner_top);

        return view('admin.company.edit', [
            'company' => $company,
//            'banners' => $banners,

            'banner_top' => $banner_top,
            'banner_two_text' => $banner_two_text,
            'banner_two' => $banner_two,
            'banner_certificates' => $banner_certificates
        ]);
    }


    public function update(Request $request, $id)
    {
//        dd($request->all());
        $request->validate([
            "name" => "nullable|string",
            "h3" => "nullable|string",
            "practice" => "nullable|string",
            "description" => "nullable|string",
            "cnt" => "nullable|string",
            "service1" => "nullable|string",
            "ico1" => "nullable|image",
            "service2" => "nullable|string",
            "ico2" => "nullable|image",
            "service3" => "nullable|string",
            "ico3" => "nullable|image",
            "service4" => "nullable|string",
            "ico4" => "nullable|image",
//            "top_slider" => "required|numeric",
//            "middle_slider" => "required|numeric",
//            "bottom_slider" => "required|numeric",

        ]);

        $data = [
            "name" => $request->input('name'),
            "h3" => $request->input('h3'),
            "practice" => $request->input('practice'),
            "description" => $request->input('description'),
            "cnt" => $request->input('cnt'),
            "service1" => $request->input('service1'),
            "service2" => $request->input('service2'),
            "service3" => $request->input('service3'),
            "service4" => $request->input('service4'),
//            "top_slider" => $request->input('top_slider'),
//            "middle_slider" => $request->input('middle_slider'),
//            "bottom_slider" => $request->input('bottom_slider'),
        ];
        /*if ($data['top_slider'] == '0'){
            $data['top_slider'] = null;
        }*/
        /*if ($data['middle_slider'] == '0') {
            $data['middle_slider'] = null;
        }
        if ($data['bottom_slider'] == '0') {
            $data['bottom_slider'] = null;
        }*/


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


    public function bannerItemEdit(Request $request, $id)
    {
        $item = BannerItems::where('id', $id)->firstOrFail();

        return view('admin.company.banners.top.edit', ['item' => $item]);
    }


    public function bannerItemUpdate(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $item = BannerItems::where('id', $id)->firstOrFail();

        if ($request->hasFile('img')) {
            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/banners/$folder");
            $data['img'] = $img;

            $old_file = storage_path('app/public') . '/' . $item->img;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }

        $item->update($data);

        return redirect()->route('admin.pages.company.edit', ['company' => 'company']);
    }


    public function bannerItemStore(Request $request)
    {
//        dd($request->all());
        $data = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'code_banner' => 'required|string'
        ]);


        if ($request->hasFile('img')) {
            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/banners/$folder");
            $data['img'] = $img;
        }

        $item = new BannerItems($data);
        $item->save();

        return back();
    }


    public function bannerItemDestroy($id)
    {
        $item = BannerItems::where('id', $id)->firstOrFail();

        $old_file = storage_path('app/public') . '/' . $item->img;
        if (is_file($old_file)) {
            unlink($old_file);
        }

        $item->delete();

        return back();
    }
}
