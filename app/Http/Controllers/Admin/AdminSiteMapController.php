<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Appointment;
use App\Models\Call;
use App\Models\CatService;
use App\Models\Company;
use App\Models\Doctor;
use App\Models\Home;
use App\Models\Option;
use App\Models\Page;
use App\Models\Post;
use App\Models\Profession;
use App\Models\Review;
use App\Models\Service;
use App\Models\TreatmentHistory;
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
        // Главная
        $home = Home::orderBy('updated_at', 'desc')->first();
        // Услуг
        $service = Service::orderBy('updated_at', 'desc')->first();
        // Цены. Они же категории услуг
        $cat_service = CatService::orderBy('updated_at', 'desc')->first();
        // Врачей
        $doctor = Doctor::orderBy('updated_at', 'desc')->first();
        // Акции, скидки
        $actions = Action::orderBy('updated_at', 'desc')->first();
        // Акции, скидки
        $profession = Profession::orderBy('updated_at', 'desc')->first();
        // Акции, скидки
        $difference = TreatmentHistory::orderBy('updated_at', 'desc')->first();
        // Акции, скидки
        $about_company = Company::orderBy('updated_at', 'desc')->first();
        // Контакты
        $contacts = Option::orderBy('updated_at', 'desc')->first();
        // Страницы
        $page = Page::orderBy('updated_at', 'desc')->first();
        // Новости
        $news = Post::orderBy('updated_at', 'desc')->first();

        return response()->view('admin.sitemaps.index', [
            'home' => $home,
            'service' => $service,
            'doctor' => $doctor,
            'cat_service' => $cat_service,
            'actions' => $actions,
            'profession' => $profession,
            'difference' => $difference,
            'about_company' => $about_company,
            'contacts' => $contacts,
            'page' => $page,
            'news' => $news
        ])->header('Content-Type', 'text/xml');
    }


    public function home()
    {
        $home = Home::all(['updated_at']);

        return response()->view('admin.sitemaps.home', [
            'home' => $home,
        ])->header('Content-Type', 'text/xml');
    }


    public function services()
    {
        $services = Service::all(['slug', 'updated_at']);

        return response()->view('admin.sitemaps.services', [
            'services' => $services,
        ])->header('Content-Type', 'text/xml');
    }


    public function doctors()
    {
        $doctors = Doctor::all(['slug', 'updated_at']);

        return response()->view('admin.sitemaps.doctors', [
            'doctors' => $doctors,
        ])->header('Content-Type', 'text/xml');
    }


    public function doctors_professions()
    {
        $professions = Profession::all(['slug', 'updated_at']);

        return response()->view('admin.sitemaps.doctors_professions', [
            'professions' => $professions,
        ])->header('Content-Type', 'text/xml');
    }


    public function price()
    {
        $categories = CatService::all(['slug', 'updated_at']);

        return response()->view('admin.sitemaps.price', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }


    public function actions()
    {
        $actions = Action::all(['slug', 'updated_at']);

        return response()->view('admin.sitemaps.actions', [
            'actions' => $actions,
        ])->header('Content-Type', 'text/xml');
    }


    public function difference()
    {
        $difference = TreatmentHistory::orderBy('updated_at', 'desc')->first();

        return response()->view('admin.sitemaps.difference', [
            'difference' => $difference,
        ])->header('Content-Type', 'text/xml');
    }


    public function about_company()
    {
        $about_company = Company::orderBy('updated_at', 'desc')->first();

        return response()->view('admin.sitemaps.about_company', [
            'about_company' => $about_company,
        ])->header('Content-Type', 'text/xml');
    }


    public function contacts()
    {
        $contacts = Option::orderBy('updated_at', 'desc')->first();

        return response()->view('admin.sitemaps.contacts', [
            'contacts' => $contacts,
        ])->header('Content-Type', 'text/xml');
    }


    public function pages()
    {
        $pages = Page::all(['slug', 'updated_at']);

        return response()->view('admin.sitemaps.pages', [
            'pages' => $pages,
        ])->header('Content-Type', 'text/xml');
    }


    public function news()
    {
        $news = Post::all(['slug', 'updated_at']);

        return response()->view('admin.sitemaps.news', [
            'news' => $news,
        ])->header('Content-Type', 'text/xml');
    }
}
