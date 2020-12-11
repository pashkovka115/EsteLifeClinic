<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdministratorController extends Controller
{
    public function index()
    {
        $admin = User::firstOrFail();

        return view('admin.administrator.index', ['admin' => $admin]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        if ($request->has('password1') and !is_null($request->input('password1'))){
            $admin = User::where('id', $id)->firstOrFail();

            if (password_verify($request->input('password1'), $admin->password)){
                $data = [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                ];

                if ($request->has('password2') and !is_null($request->input('password2')) and
                    $request->has('password3') and !is_null($request->input('password3')) and
                    $request->has('password2') == $request->input('password3')
                ){
                    $data['password'] = Hash::make($request->input('password2'));
                }
//                dd($request->all());
                $admin->update($data);

                return back();
            }
        }

        flash('Не указан действующий пароль');
        return back();
    }
}
