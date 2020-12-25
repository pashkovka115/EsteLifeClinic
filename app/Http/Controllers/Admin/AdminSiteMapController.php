<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Appointment;
use App\Models\Call;
use App\Models\CatService;
use App\Models\Doctor;
use App\Models\Post;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminSiteMapController extends Controller
{
    //все sitemaps
    /*public function sitemapIndex(){
        $ceiling = Ceiling::orderBy('updated_at', 'desc')->first();
        $lightning = Light::orderBy('updated_at', 'desc')->first();
        $page = Page::orderBy('updated_at', 'desc')->first();
        $post = Post::orderBy('updated_at', 'desc')->first();
        return response()->view('front.sitemaps.index', [
            'ceiling'=>$ceiling,
            'page'=>$page,
            'lightning'=>$lightning,
            'post'=>$post
        ])->header('Content-Type', 'text/xml');
    }*/

    public function index()
    {
        // Услуг
        $service = Service::orderBy('updated_at', 'desc')->first();
        // Врачей
        $doctor = Doctor::orderBy('updated_at', 'desc')->first();

        return response()->view('admin.sitemaps.index', [
            'service' => $service,
            'doctor' => $doctor,
        ])->header('Content-Type', 'text/xml');
    }


    public function services()
    {
        $services = Service::all();

        return response()->view('admin.sitemaps.services', [
            'services' => $services,
        ])->header('Content-Type', 'text/xml');
    }


    public function catServices()
    {
        $cat_services = CatService::all();

        return response()->view('admin.sitemaps.cat_services', [
            'cat_services' => $cat_services,
        ])->header('Content-Type', 'text/xml');
    }


    public function doctors()
    {
        $doctors = Doctor::all();

        return response()->view('admin.sitemaps.doctors', [
            'doctors' => $doctors,
        ])->header('Content-Type', 'text/xml');
    }



}
