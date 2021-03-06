<?php

namespace App\Http\Controllers\Admin\Price;

use App\Http\Controllers\Controller;
use App\Models\PriceDirection;
use Illuminate\Http\Request;

class AdminDirectionController extends Controller
{
    public function index()
    {
        $directions = PriceDirection::paginate();

        return view('admin.price.directions.index', ['directions' => $directions]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        $direction = new PriceDirection($data);
        $direction->save();

        return back();
    }


    public function edit($id)
    {
        $direction = PriceDirection::where('id', $id)->firstOrFail();

        return view('admin.price.directions.edit', ['direction' => $direction]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        PriceDirection::where('id', $id)->update($data);

        return redirect()->route('admin.price.direction.index');
    }


    public function destroy($id)
    {
        $direction = PriceDirection::with('services')->where('id', $id)->firstOrFail();

        if ($direction and $direction->services->count() > 0){
            $servs = [];
            foreach ($direction->services as $serv){
                $servs[] = $serv->name;
            }
            flash('В этом направлении есть услуги. Удалите или перенесите их в другие напраления: ' . implode(', ', $servs))->error();
            return back();
        }
        $direction->delete();

        return back();
    }
}
