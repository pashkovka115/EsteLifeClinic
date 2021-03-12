<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BannerItems;
use App\Models\Company;
use App\Models\Post;
use App\Models\Review;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    public function index()
    {
//        $company = Company::with(['top_sliders', 'middle_sliders', 'bottom_sliders'])->firstOrFail();
        $company = Company::firstOrFail();
        $reviews = Review::orderBy('updated_at', 'DESC')->limit(50)->get();
        $latest_news = Post::orderBy('updated_at', 'DESC')->limit(3)->get();

        $top_banner = BannerItems::where('code_banner', 'about_company_top')->get();
        $banner_two = BannerItems::where('code_banner', 'about_company_two')->get();
        $banner_two_text = BannerItems::where('code_banner', 'about_company_two_text')->first();
        $banner_certificates = BannerItems::where('code_banner', 'about_company_certificates')->get();

        return view('pages.about_company.index', [
            'company' => $company,
            'reviews' => $reviews,
            'latest_news' => $latest_news,

            'top_banner' => $top_banner,
            'banner_two' => $banner_two,
            'banner_two_text' => $banner_two_text,
            'banner_certificates' => $banner_certificates
        ]);
    }
}
