<?php

namespace App\Http\Controllers;

use App\Models\CatService;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('category')
            ->where('visibility', '1')
            ->paginate(6);

        $cats_ids = Review::all('cat_service_id');
        $cats_ids = array_keys($cats_ids->keyBy('cat_service_id')->toArray());
        $categories = CatService::whereIn('id', $cats_ids)->get(['id', 'name', 'slug']);

        return view('pages.reviews.index', ['reviews' => $reviews, 'categories' => $categories]);
    }


    public function index_ajax()
    {
        $reviews = Review::with('category')
            ->where('visibility', '1')
            ->paginate(6);

        return view('pages.reviews.index_ajax', ['reviews' => $reviews]);
    }


    public function show($cat_id)
    {
        $reviews = Review::with('category')
            ->where('cat_service_id', $cat_id)
            ->where('visibility', '1')
            ->paginate(6);

        $cats_ids = Review::all('cat_service_id');
        $cats_ids = array_keys($cats_ids->keyBy('cat_service_id')->toArray());
        $categories = CatService::whereIn('id', $cats_ids)->get(['id', 'name', 'slug']);

        return view('pages.reviews.index', ['reviews' => $reviews, 'categories' => $categories, 'cat_id' => $cat_id]);
    }


    public function show_ajax($cat_id)
    {
        $reviews = Review::with('category')
            ->where('cat_service_id', $cat_id)
            ->where('visibility', '1')
            ->paginate(6);

        return view('pages.reviews.index_ajax', ['reviews' => $reviews]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'content' => 'required|string',
            'cat_service_id' => 'required|numeric',
        ]);

        $rev = new Review($request->except(['_token']));
        $rev->save();

        return back();
    }
}
