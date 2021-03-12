<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\BannerItems;
use App\Models\CatService;
use App\Models\Company;
use App\Models\Doctor;
use App\Models\Home;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::first();
        if (is_null($home)){
            return 'Необходимо создать главную страницу';
        }

        $top_slider = BannerItems::where('code_banner', 'home_top')->get();
        $about_us_description = BannerItems::where('code_banner', 'general_home_about_us')->first();
        $about_us_slider = BannerItems::with('banner')
            ->where('code_banner', 'home_about_us')
            ->get();

        $actions = Action::where('show_home', '1')->get();
        $doctors = Doctor::with(['professions', 'jobs'])->limit($home->count_doctors_list)->get();
        $company = Company::firstOrFail(['h3', 'practice', 'cnt']);
        $posts = Post::orderBy('updated_at', 'DESC')->limit(3)->get();
        $categories = CatService::with('services')->get();

        return view('pages.home.index', [
            'home' => $home,
            'actions' => $actions,
            'doctors' => $doctors,
            'company' => $company,
            'posts' => $posts,

            'top_slider' => $top_slider,
            'about_us_slider' => $about_us_slider,
            'about_us_description' => $about_us_description,
            'categories' => $categories,
        ]);
    }
}
