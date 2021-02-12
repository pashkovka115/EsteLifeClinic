<?php

namespace App\Http\Controllers\Admin\Price;

use App\Http\Controllers\Controller;
use App\Models\PriceCategory;
use App\Models\PriceDirection;
use App\Models\PriceService;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index($direction_id)
    {
//        $categories = PriceCategory::with('services')->where('pricedirection_id', $direction_id)->paginate();
//        $all_cats = PriceCategory::all(['id', 'name']);
//        $direction = PriceDirection::where('id', $direction_id)->firstOrFail();

        $direction = PriceDirection::where('id', $direction_id)->firstOrFail();
        $directions = PriceDirection::all(['id', 'name']);

        $services = PriceService::with(['directions', 'children'])
            ->where('parent_id', 0)
            ->whereHas('directions', function ($query) use ($direction_id){
                $query->where('pricedirections.id', $direction_id);
            })
            ->get();

        return view('admin.price.categories.index', [
//            'categories' => $categories,
//            'all_cats' => $all_cats,
            'direction' => $direction,
            'directions' => $directions,
            'services' => $services
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'pricedirection_id' => 'required|numeric',
            'name' => 'required|string',
        ]);

        $direction = new PriceCategory($data);
        $direction->save();

        return back();
    }


    public function edit($id)
    {
        $category = PriceCategory::with('direction')->where('id', $id)->firstOrFail();
        $dirs = PriceDirection::all(['id', 'name']);

        return view('admin.price.categories.edit', [
            'category' => $category,
            'directions' => $dirs
        ]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'pricedirection_id' => 'required|numeric',
            'name' => 'required|string',
        ]);

        PriceCategory::where('id', $id)->update($data);

        return back();
    }


    public function destroy($id)
    {
        $cat = PriceCategory::with('services')->where('id', $id)->firstOrFail();
        if ($cat and $cat->services->count() > 0){
            flash('В этой категории есть услуги. Вначале удалите услуги')->error();
            return back();
        }
        $cat->delete();

        return back();
    }
}
