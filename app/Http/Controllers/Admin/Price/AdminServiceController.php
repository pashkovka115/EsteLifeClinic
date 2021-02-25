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
        $temp = PriceService::with(['children', 'directions'])->where('id', $service_id)->firstOrFail();

        return view('admin.price.services.index', [
            'services' => $temp->children,
            'parent_id' => $service_id,
            'parent_name' => $temp->name,
            'parent_type' => $temp->type,
            'pricedirection_id' => $temp->directions[0]->id
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            "code" => 'nullable|string',
            "name" => 'required|string',
            "pricedirection_id" => 'required|string',
            "parent_id" => 'nullable|numeric',
            "price" => 'nullable|string',
            'type' => 'required|numeric'
        ]);
        if ($data['parent_id'] == null){
            $data['parent_id'] = 0;
        }

        $sevice = new PriceService($data);
        $sevice->save();

        // Не надо прикреплять к направлению т.к. есть родитель
        if ($data['parent_id'] > 0){
            return back();
        }

        $dir = PriceDirection::with('services')->where('id', $data['pricedirection_id'])->firstOrFail();
        $dir->services()->attach([$sevice->id]);

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
        $serv = PriceService::with(['directions', 'children'])->where('id', $id)->firstOrFail();
        if ($serv->children->count() == 0){
            $dirs = PriceDirection::all(['id']);
            $dirs_ids = array_keys($dirs->keyBy('id')->toArray());
            $serv->directions()->detach($dirs_ids);
            $serv->delete();
        }else{
            flash('В этой группе есть услуги');
        }

        return back();
    }


    public function startPageForAjax()
    {
        $services = PriceService::with(['directions', 'parent'])->get();
        $directions = PriceDirection::all(['id', 'name']);

        if (isset($directions[0])){
            $groups_services = PriceService::where('type', 1)
                ->whereHas('directions', function ($query) use ($directions) {
                    $query->where('pricedirections.id', $directions[0]->id);
                })->get();
        }


        return view('admin.price.services.start_page_fo_ajax', [
            'services' => $services,
            'directions' => $directions,
            'groups_services' => $groups_services
        ]);
    }


    /*
     * Ещё один способ добавления услуги
     */
    public function createNewService()
    {
        $directions = PriceDirection::all(['id', 'name']);
        if (isset($directions[0])){
            $groups_services = PriceService::where('pricedirection_id', $directions[0]->id)
                ->where('type', 1)
                ->get();
        }

        return view('admin.price.services.createNewService', [
            'directions' => $directions,
            'groups_services' => $groups_services ?? []
        ]);
    }


    public function getGroupService(Request $request)
    {
        $data = $request->validate([
            'pricedirection_id' => 'required|numeric'
        ]);

        $groups_services = PriceService::where('pricedirection_id', $data['pricedirection_id'])
            ->where('type', 1)
            ->get();

        return json_encode($groups_services->toArray(), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }


    public function storeNewService(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|numeric',
            'name' => 'required|string',
            'code' => 'nullable|string',
            'price' => 'nullable|string',
            'discount_price' => 'nullable|string',
            'pricedirection_id' => 'required|numeric',
            'parent_id' => 'nullable|numeric',
        ]);

        $serv = new PriceService($data);
        $serv->save();

        $dir = PriceDirection::with('services')->where('id', $data['pricedirection_id'])->firstOrFail();
        $dir->services()->attach($serv->id);

        if ($serv->id){
            flash('Добавлено. ' . $serv->name)->success();
        }else{
            flash('Непредвиденная ошибка. ' . $serv->name)->success();
        }

        return back();
    }


    /*
     * Отключить показ кода всех услуг
     */
    public function disableShowingCode()
    {
        PriceService::where('show_code', '1')->update(['show_code' => '0']);

        return back();
    }
}
