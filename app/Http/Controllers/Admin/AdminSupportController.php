<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SupportMail;
use App\Models\Support;
use Illuminate\Http\Request;

class AdminSupportController extends Controller
{
    public function create()
    {
        $messages = Support::all();

        return view('admin.support.create', ['messages' => $messages]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'theme' => 'required|string',
            'img' => 'nullable|image',
            'description' => 'required|string',
        ]);

        $data = $request->except('_token');

        $folder = date('Y/m/d');

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("images/support/$folder");
            $data['img'] = $img;
        }

        $message = new Support($data);
        $message->save();

        // todo: пока неизвестно куда отправлять
        /*if ($data){
            \Mail::to(MAIL_SUPPORT)->send(new SupportMail($data));
        }*/

        return back();
    }
}
