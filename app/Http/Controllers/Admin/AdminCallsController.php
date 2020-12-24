<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Call;
use Illuminate\Http\Request;

class AdminCallsController extends Controller
{
    public function index()
    {
        $calls = Call::orderBy('status')->paginate();

        return view('admin.calls.index', ['calls' => $calls]);
    }


    // ajax
    public function update(Request $request, $id=0)
    {
        print_r($request->all());
        $request->validate([
            'id' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        $cal = Call::where('id', $request->input('id'))->update([
            'status' => $request->input('status')
        ]);
        if ($cal){
            return 'OK!';
        }else{
            return 'Error!!!';
        }
    }


    public function destroy($id)
    {
        Call::where('id', $id)->delete();

        return back();
    }
}
