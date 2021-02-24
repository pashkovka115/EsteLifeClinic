<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatService;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index()
    {
        $reviws = Review::with('category')->orderBy('visibility')->paginate();

        return view('admin.reviews.index', ['reviws' => $reviws]);
    }


    public function create()
    {
        $categories = CatService::all(['id', 'name']);

        return view('admin.reviews.create', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'cat_service_id' => 'required|numeric',
            'content' => 'required|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'cat_service_id' => $request->input('cat_service_id'),
            'content' => $request->input('content'),
        ];

        if ($request->has('visibility')){
            $data['visibility'] = '1';
        }else{
            $data['visibility'] = '0';
        }

        $review = new Review($data);
        $review->save();

        return redirect()->route('admin.content.reviews.reviews.edit', ['review' => $review->id]);
    }


    public function edit($id)
    {
        $review = Review::with('category')->where('id', $id)->firstOrFail();
        $categories = CatService::all(['id', 'name']);

        return view('admin.reviews.edit', ['review' => $review, 'categories' => $categories]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'cat_service_id' => 'required|numeric',
            'content' => 'required|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'cat_service_id' => $request->input('cat_service_id'),
            'content' => $request->input('content'),
        ];

        if ($request->has('visibility')){
            $data['visibility'] = '1';
        }else{
            $data['visibility'] = '0';
        }

        Review::where('id', $id)->update($data);

        return redirect()->route('admin.content.reviews.reviews.index');
    }


    public function destroy($id)
    {
        Review::where('id', $id)->delete();

        return back();
    }
}
