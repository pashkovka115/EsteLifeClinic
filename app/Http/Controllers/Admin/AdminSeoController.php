<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\CatPost;
use App\Models\CatService;
use App\Models\Company;
use App\Models\Doctor;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminSeoController extends Controller
{
    public function index()
    {
        $services = Service::all(['id', 'name', 'title', 'keywords', 'meta_description']);
        $actions = Action::all(['id', 'name', 'title', 'keywords', 'meta_description']);
        $cats_posts = CatPost::all(['id', 'name', 'title', 'keywords', 'meta_description']);
        $cats_services = CatService::all(['id', 'name', 'title', 'keywords', 'meta_description']);
        $posts = Post::all(['id', 'name', 'title', 'keywords', 'meta_description']);
        $doctors = Doctor::all(['id', 'name', 'title', 'keywords', 'meta_description']);
        $pages = Doctor::all(['id', 'name', 'title', 'keywords', 'meta_description']);

        // по одной записи
        $companys = Company::all(['id', 'name', 'title', 'keywords', 'meta_description']);


        return view('admin.seo.index', [
            'services' => $services,
            'actions' => $actions,
            'cats_posts' => $cats_posts,
            'cats_services' => $cats_services,
            'posts' => $posts,
            'doctors' => $doctors,
            'pages' => $pages,
            'companys' => $companys
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    // ajax
    public function update(Request $request)
    {
        print_r($request->all());

        $request->validate([
            'model' => 'required|string',
            'id' => 'required|numeric',
            'title' => 'nullable|string',
            'keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        $model_str = ucfirst($request->input('model'));
        if (class_exists("App\Models\\$model_str")){
            $model = "App\Models\\$model_str";
            $model::where('id', $request->input('id'))->update([
                'title' => $request->input('title'),
                'keywords' => $request->input('keywords'),
                'meta_description' => $request->input('meta_description'),
            ]);

            return 'OK';
        }

        return 'Error!!!';
    }


    public function destroy($id)
    {
        //
    }
}
