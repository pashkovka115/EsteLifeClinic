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
        $direction = PriceDirection::where('id', $direction_id)->firstOrFail();
        $directions = PriceDirection::all(['id', 'name']);

        $groups_services = PriceService::where('type', 1)
            ->whereHas('directions', function ($query) use ($direction_id){
                $query->where('pricedirections.id', $direction_id);
            })->get();

        $services = PriceService::with(['directions', 'children'])
            ->where('parent_id', 0)
            ->whereHas('directions', function ($query) use ($direction_id){
                $query->where('pricedirections.id', $direction_id);
            })
            ->get();

        return view('admin.price.categories.index', [
            'direction' => $direction,
            'directions' => $directions,
            'services' => $services,
            'groups_services' => $groups_services
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'pricedirection_id' => 'required|numeric',
            'name' => 'required|string',
        ]);

        $service = new PriceService([
            'name' => $data['name'],
            'type' => 1
        ]);
        $service->save();

        $dir = PriceDirection::with('services')->where('id', $data['pricedirection_id'])->firstOrFail();
        $dir->services()->attach([$service->id]);

        return back();
    }


    public function edit($id)
    {
        $serv = PriceService::with('directions')->where('id', $id)->firstOrFail();
        $dirs = PriceDirection::all(['id', 'name']);
        $servs = PriceService::with('directions')
            ->where('type', 1)
            ->where('parent_id', 0)
            ->whereHas('directions', function ($query) use ($serv){
                $query->where('pricedirections.id', $serv->directions[0]->id);
            })->get();


        return view('admin.price.categories.edit', [
            'directions' => $dirs,
            'service' => $serv,
            'group_services' => $servs
        ]);
    }


    public function editAjax(Request $request)
    {
        $data = $request->validate([
            'pricedirection_id' => 'required|numeric'
        ]);

        $servs = PriceService::with('directions')
            ->where('type', 1)
            ->where('parent_id', 0)
            ->whereHas('directions', function ($query) use ($data){
                $query->where('pricedirections.id', $data['pricedirection_id']);
            })->get();

        return json_encode($servs->toArray(), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'pricedirection_id' => 'required|numeric',
            'name' => 'required|string',
            'price' => 'nullable|string',
            'discount_price' => 'nullable|string',
        ]);

        $dirs = PriceDirection::all(['id']);
        $dirs_ids = array_keys($dirs->keyBy('id')->toArray());
        $serv = PriceService::with('directions')->where('id', $id)->firstOrFail();
        $serv->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'discount_price' => $data['discount_price'],
        ]);

        $serv->directions()->detach($dirs_ids);
        $serv->directions()->attach([$data['pricedirection_id']]);

        return back();
    }


    public function destroy($id)
    {
        $serv = PriceService::with(['directions', 'children'])->where('id', $id)->firstOrFail();
        if ($serv and $serv->children->count() > 0){
            flash('В этой группе есть услуги. Вначале удалите дочерние услуги.')->error();
            return back();
        }

        $dirs = PriceDirection::all(['id']);
        $dirs_ids = array_keys($dirs->keyBy('id')->toArray());

        $serv->directions()->detach($dirs_ids);
        $serv->delete();

        return back();
    }
}
