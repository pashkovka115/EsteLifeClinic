<?php

namespace App\Http\Controllers;

use App\Models\CatService;
use App\Models\Service;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $categories = CatService::with(['children', 'services'])->whereNull('parent_id')->get();
        $all_categories = CatService::all(['slug', 'name']);

        return view('pages.price.index', ['categories' => $categories, 'all_categories' => $all_categories]);
    }


    public function show($slug)
    {
        $categories = CatService::with(['children'])->where('slug', $slug)->get();
        $all_categories = CatService::all(['slug', 'name']);

        return view('pages.price.index', ['categories' => $categories, 'all_categories' => $all_categories]);
    }


    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string',
            'slug' => 'required|string',
        ]);
        $search = $request->input('search');
        $slug = $request->input('slug');

        $servs = Service::with('category')->where('name', 'like', "%$search%")->get();
        $cats_ids = [];
        foreach ($servs as $serv){
            $cats_ids[] = $serv->category->id;
        }

        $categories = CatService::with(['services'])->whereIn('id', array_unique($cats_ids))->distinct();
        if ($slug != '0'){
            $categories->where('slug', $slug);
        }
        $categories = $categories->get();

        $all_categories = CatService::all(['slug', 'name']);

        return view('pages.price.search', ['categories' => $categories, 'all_categories' => $all_categories]);
    }
}
