<?php

namespace App\Http\Controllers\Admin\Price;

use App\Http\Controllers\Controller;
use App\Models\PriceCategory;
use App\Models\PriceService;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index($category_id)
    {
        $serv = PriceService::with(['category'])->where('price_category_id', $category_id)->paginate();
        $cats = PriceCategory::all(['id', 'name']);

        return view('admin.price.services.index', ['services' => $serv, 'categories' => $cats]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            "code" => 'nullable|string',
            "name" => 'required|string',
            "price_category_id" => 'required|numeric',
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

        return view('admin.price.services.start_page_fo_ajax', ['services' => $services]);
    }

/*// "draw":"1"
// JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE
    public function dataForAjax(Request $request)
    {
//        return ['draw' => $request->input('draw'), 'length' => '20'];
//        foreach ($request->all() as $item => $value){
//            file_put_contents(base_path('data.txt'), $item . ' => ' . $value . "\n", FILE_APPEND);
//        }

        $services = PriceService::paginate(15, ['code', 'name', 'price']);

        return json_encode($services->toArray(), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);

//        return response()->json($services->toArray())
//            ->header('Content-Type', 'json;charset=utf-8')
//            ->setEncodingOptions();
    }*/
}
