<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::where('finish', '>=', Carbon::now())->get();

        return view('pages.actions.index', ['actions'=> $actions]);
    }


    public function show($slug)
    {
        $action = Action::with(['conditions'])->where('slug', $slug)->firstOrFail();
        $all_actions = Action::all(['slug', 'banner_img', 'name']);

        return view('pages.actions.show', ['action'=> $action, 'all_actions' => $all_actions]);
    }
}
