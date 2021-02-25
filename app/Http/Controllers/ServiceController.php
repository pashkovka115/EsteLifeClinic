<?php

namespace App\Http\Controllers;

use App\Models\CatService;
use App\Models\Doctor;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $service = Service::with(['actions', 'prices', 'category', 'treatment_history'])->where('slug', $slug)->firstOrFail();
        $cat = CatService::with('services')->where('id', $service->category->id)->firstOrFail();
        $doctors = Doctor::with(['professions', 'jobs'])->limit(7)->get();
        $latest_news = Post::orderBy('updated_at', 'DESC')->limit(3)->get();

//        dd($service);

        return view('pages.services.show', [
            'service' => $service,
            'category' => $cat,
            'doctors' => $doctors,
            'latest_news' => $latest_news
        ]);
    }
}
