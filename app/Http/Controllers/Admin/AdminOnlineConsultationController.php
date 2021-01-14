<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlineConsultation;
use Illuminate\Http\Request;

class AdminOnlineConsultationController extends Controller
{
    public function index()
    {
        $online = OnlineConsultation::paginate();

        return view('admin.online_consultation.index', ['onlines' => $online]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
