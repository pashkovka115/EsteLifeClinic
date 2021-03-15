<?php

namespace App\Http\Controllers;

use App\Models\CatService;
use App\Models\PriceDirection;
use App\Models\PriceService;
use App\Models\Service;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $directions = PriceDirection::with(['services' => function($query){
            $query->orderBy('parent_id')->orderBy('type', 'asc');
        }])->get();

        $all_directions = PriceDirection::all(['id', 'name']);

        return view('pages.price.index', [
            'directions' => $directions,
            'all_directions' => $all_directions
        ]);
    }


    public function show($slug)
    {
        $categories = CatService::with(['children', 'parents'])->where('slug', $slug)->get();
        $all_categories = CatService::all(['slug', 'name']);

        return view('pages.price.index', [
            'categories' => $categories,
            'all_categories' => $all_categories,
            'slug' => $slug
        ]);
    }


    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string',
            'pricedirection_id' => 'nullable|numeric',
        ]);
        $search = $request->input('search');
        $pricedirection_id = (int)$request->input('pricedirection_id');


        if ($pricedirection_id > 0){
            $servs = PriceService::with('directions')
                ->where('type', 2)
                ->where('pricedirection_id', $pricedirection_id)
                ->where('name', 'like', "%$search%")
                ->get();
        }elseif ($pricedirection_id == 0){
            $servs = PriceService::with('directions')
                ->where('type', 2)
                ->where('name', 'like', "%$search%")
                ->get();
        }

        $all_directions = PriceDirection::all(['id', 'name']);
        $sorted_dirs = $all_directions->keyBy('id');

        $directions = [];
        foreach ($servs as $serv){
            $directions[$sorted_dirs[$serv->pricedirection_id]->name][] = $serv;
        }


        return view('pages.price.search', [
            'directions' => $directions,
            'all_directions' => $all_directions
        ]);
    }
}
