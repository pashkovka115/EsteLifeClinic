<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Company;
use App\Models\Post;
use App\Models\Review;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    public function index()
    {
        $company = Company::with(['top_sliders', 'middle_sliders', 'bottom_sliders'])->firstOrFail();
        $reviews = Review::orderBy('updated_at', 'DESC')->limit(50)->get();
        $latest_news = Post::orderBy('updated_at', 'DESC')->limit(3)->get();

        return view('pages.about_company.index', [
            'company' => $company,
            'reviews' => $reviews,
            'latest_news' => $latest_news
        ]);
    }
}
