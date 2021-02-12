<?php

namespace App\Http\Controllers\Admin\Price;

use App\Http\Controllers\Controller;
use App\Models\PriceCategory;
use App\Models\PriceDirection;
use App\Models\PriceService;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index($service_id)
    {
        $serv = PriceService::with(['directions'])->where('id', $service_id)->paginate();
//        $cats = PriceCategory::all(['id', 'name']);

        return view('admin.price.services.index', ['services' => $serv]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            "code" => 'nullable|string',
            "name" => 'required|string',
//            "price_category_id" => 'required|numeric',
            "price" => 'nullable|string'
        ]);

        $sevice = new PriceService($data);
        $sevice->save();

        return back();
    }


    public function update(Request $request, $id = null)
    {
        $data = $request->validate([
            'id' => 'required|numeric',
            'field' => 'required|string',
            'data' => 'nullable|string'
        ]);

        PriceService::where('id', $data['id'])->update([$data['field'] => $data['data']]);

        return 'OK';
    }


    public function destroy($id)
    {
        PriceService::where('id', $id)->delete();

        return back();
    }


    public function startPageForAjax()
    {
        $services = PriceService::with('category')->get();
        $all_cats = PriceCategory::all(['id', 'name']);
        $directions = PriceDirection::all(['id', 'name']);

        return view('admin.price.services.start_page_fo_ajax', [
            'services' => $services,
            'all_cats' => $all_cats,
            'directions' => $directions
        ]);
    }
}
