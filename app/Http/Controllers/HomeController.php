<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Company;
use App\Models\Doctor;
use App\Models\Home;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::with(['top_sliders', 'useful_tips', 'medical_center_sliders'])->first();
        if (is_null($home)){
            return 'Необходимо создать главную страницу';
        }

        $actions = Action::limit($home->action_slider)->get();
        $doctors = Doctor::with(['professions', 'jobs'])->limit($home->count_doctors_list)->get();
        $company = Company::firstOrFail(['h3', 'practice', 'cnt']);
        $posts = Post::orderBy('updated_at', 'DESC')->limit($home->count_news)->get();

        return view('pages.home.index', [
            'home' => $home,
            'actions' => $actions,
            'doctors' => $doctors,
            'company' => $company,
            'posts' => $posts
        ]);
    }
}
