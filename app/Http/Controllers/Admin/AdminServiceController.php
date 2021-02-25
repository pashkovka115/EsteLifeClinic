<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\CatService;
use App\Models\Doctor;
use App\Models\PriceDirection;
use App\Models\PriceService;
use App\Models\Service;
use App\Models\ServicePriceservic;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->get();

        $types = ['cosmetology' => 'Косметология', 'medicine' => 'Медицина'];

        return view('admin.services.index', [
            'services' => $services,
            'all_types' => $types
        ]);
    }


    public function create()
    {
        $cats = CatService::whereNull('parent_id')->where('type', 'medicine')->with('children')->get();

//        $types = ['cosmetology' => 'Косметология', 'medicine' => 'Медицина'];

        return view('admin.services.create', [
            'categories' => $cats,
//            'all_types' => $types
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'nullable|numeric',
            'cat_service_id' => 'required|numeric',
//            'action_id' => 'required|numeric',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'img' => 'nullable|image',
            'ico1' => 'nullable|image',
            'ico2' => 'nullable|image',
            'ico3' => 'nullable|image',
            'ico4' => 'nullable|image',
            'service1' => 'nullable|string',
            'service2' => 'nullable|string',
            'service3' => 'nullable|string',
            'service4' => 'nullable|string',
        ]);

        $data = [
//            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'cat_service_id' => $request->input('cat_service_id'),
//            'action_id' => $request->input('action_id'),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'meta_description' => $request->input('meta_description'),
            'service1' => $request->input('service1'),
            'service2' => $request->input('service2'),
            'service3' => $request->input('service3'),
            'service4' => $request->input('service4'),
        ];
        /*if ($data['action_id'] == '0'){
            $data['action_id'] = null;
        }*/

        $folder = date('Y/m/d');

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("images/services/$folder");
            $data['img'] = $img;
        }

        if ($request->hasFile('ico1')) {
            $img = $request->file('ico1')->store("images/services/$folder");
            $data['ico1'] = $img;
        }

        if ($request->hasFile('ico2')) {
            $img = $request->file('ico2')->store("images/services/$folder");
            $data['ico2'] = $img;
        }

        if ($request->hasFile('ico3')) {
            $img = $request->file('ico3')->store("images/services/$folder");
            $data['ico3'] = $img;
        }

        if ($request->hasFile('ico4')) {
            $img = $request->file('ico4')->store("images/services/$folder");
            $data['ico4'] = $img;
        }

        $service = new Service($data);
        $service->save();

        return redirect()->route('admin.services.services.edit', ['service' => $service->id]);
    }


    public function edit($id)
    {
        $serv = Service::with(['category', 'treatment_history'])
            ->where('id', $id)
            ->firstOrFail();

        $cats = CatService::whereNull('parent_id')->where('type', $serv->category->type)->with('children')->get();
        $directions = PriceDirection::all(['id', 'name']);

        if (isset($directions[0])) {
            $services = PriceService::with('directions')
//                ->where('type', 2)
                ->where('pricedirection_id', $directions[0]->id)
                ->get();
        }

        $ties = ServicePriceservic::where('service_id', $id)->get();
        $price_services_ids = array_keys($ties->keyBy('priceservice_id')->toArray());
        $tie_services = PriceService::with(['directions', 'parent'])->whereIn('id', $price_services_ids)->get();

        $doctors = Doctor::all(['id', 'name']);

        $types = ['cosmetology' => 'Косметология', 'medicine' => 'Медицина'];

        return view('admin.services.edit', [
            'service' => $serv,
            'categories' => $cats,
            'current_type' => $serv->category->type,
            'all_types' => $types,
            'directions' => $directions,
            'services' => $services ?? [],
            'tie_services' => $tie_services,
            'doctors' => $doctors
        ]);
    }


    /*public function editAjax(Request $request)
    {
        // todo: доделать
        $data = $request->validate([
            'pricedirection_id' => 'required|numeric'
        ]);

        $services = PriceService::with('directions')
            ->whereHas('directions', function ($query) use ($data) {
                return $query->where('pricedirections.id', $data['pricedirection_id']);
            })
            ->get();


        return json_encode($services->toArray(), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }*/


    public function updateAjax(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|numeric',
            'field' => 'required|string',
            'data' => 'nullable|string'
        ]);

        Service::where('id', $data['id'])->update([$data['field'] => $data['data']]);

        return 'OK';
    }

    /*
     * Связать услугу и цены
     */
    public function tiePriceService(Request $request)
    {
        $data = $request->validate([
            'service_id' => 'required|numeric',
            'priceservice_id' => 'required|numeric'
        ]);

        $tie = new ServicePriceservic($data);
        $tie->save();

        return back();
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
//            'type' => 'required|string',
            'price' => 'nullable|string',
            'cat_service_id' => 'required|numeric',
//            'action_id' => 'required|numeric',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'img' => 'nullable|image',
            'ico1' => 'nullable|image',
            'ico2' => 'nullable|image',
            'ico3' => 'nullable|image',
            'ico4' => 'nullable|image',
            'service1' => 'nullable|string',
            'service2' => 'nullable|string',
            'service3' => 'nullable|string',
            'service4' => 'nullable|string',
        ]);

        $data = [
//            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'cat_service_id' => $request->input('cat_service_id'),
//            'action_id' => $request->input('action_id'),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'meta_description' => $request->input('meta_description'),
            'service1' => $request->input('service1'),
            'service2' => $request->input('service2'),
            'service3' => $request->input('service3'),
            'service4' => $request->input('service4'),
        ];
        /*if ($data['action_id'] == '0'){
            $data['action_id'] = null;
        }*/

        $serv = Service::where('id', $id)->firstOrFail();

        if ($request->hasFile('img')) {
            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/services/$folder");
            $data['img'] = $img;
            $old_file = storage_path('app/public') . '/' . $serv->img;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }

        if ($request->hasFile('ico1')) {
            $folder = date('Y/m/d');
            $img = $request->file('ico1')->store("images/services/$folder");
            $data['ico1'] = $img;
            $old_file = storage_path('app/public') . '/' . $serv->ico1;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }

        if ($request->hasFile('ico2')) {
            $folder = date('Y/m/d');
            $img = $request->file('ico2')->store("images/services/$folder");
            $data['ico2'] = $img;
            $old_file = storage_path('app/public') . '/' . $serv->ico2;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }

        if ($request->hasFile('ico3')) {
            $folder = date('Y/m/d');
            $img = $request->file('ico3')->store("images/services/$folder");
            $data['ico3'] = $img;
            $old_file = storage_path('app/public') . '/' . $serv->ico3;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }

        if ($request->hasFile('ico4')) {
            $folder = date('Y/m/d');
            $img = $request->file('ico4')->store("images/services/$folder");
            $data['ico4'] = $img;
            $old_file = storage_path('app/public') . '/' . $serv->ico4;
            if (is_file($old_file)) {
                unlink($old_file);
            }
        }

        $serv->update($data);

        return redirect()->route('admin.services.services.index');
    }


    public function destroy($id)
    {
        $serv = Service::with(['doctors', 'appointments'])->where('id', $id)->firstOrFail();
        $serv->doctors()->detach(array_keys(Doctor::all('id')->keyBy('id')->toArray()));
        $serv->appointments()->delete();
        $serv->delete();

        return back();
    }


    /*
     * Отсоединяем цену от услуги
     */
    public function detachPrice(Request $request)
    {
        $data = $request->validate([
            'service_id' => 'required|numeric',
            'priceservice_id' => 'required|numeric',
        ]);

        ServicePriceservic::where('service_id', $data['service_id'])
            ->where('priceservice_id', $data['priceservice_id'])
            ->delete();

        return back();
    }
}
