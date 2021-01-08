<?php

namespace App\Http\Controllers;

use App\Models\CatService;
use App\Models\TreatmentHistory;
use Illuminate\Http\Request;



class BeforeAfterController extends Controller
{
    public function index()
    {
        $items = TreatmentHistory::with(['doctor', 'category'])->paginate(7);
        $categories = CatService::where('before_after', '1')->get(['name', 'slug']);

        return view('pages.before_after.index', ['items' => $items, 'categories' => $categories]);
    }


    public function show($slug)
    {
        $all_cats = array_keys(CatService::where('slug', $slug)->get('id')->keyBy('id')->toArray());
        $items = TreatmentHistory::with(['doctor', 'category'])->whereIn('cat_service_id', $all_cats)->paginate(7);
        $categories = CatService::where('before_after', '1')->get(['name', 'slug']);

        return view('pages.before_after.index', ['items' => $items, 'categories' => $categories]);
    }


    public function ajax(Request $request)
    {
        if (is_null($request->input('slug'))){
            $items = TreatmentHistory::with(['doctor', 'category'])->paginate(7);
        }else{
            $all_cats = array_keys(CatService::where('slug', $request->input('slug'))->get('id')->keyBy('id')->toArray());
            $items = TreatmentHistory::with(['doctor', 'category'])->whereIn('cat_service_id', $all_cats)->paginate(7);
        }

        return view('pages.before_after.ajax', ['items' => $items]);
    }
}
