<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\ConditionsAction;
use Illuminate\Http\Request;

class AdminConditionController extends Controller
{
    public function edit($action_id, $condition_id)
    {
        $condition = ConditionsAction::where('action_id', $action_id)->where('id', $condition_id)->firstOrFail();

        return view('admin.conditions_actions.edit', ['condition' => $condition]);
    }


    public function create()
    {
        $actions = Action::all(['id', 'name']);

        return view('admin.conditions_actions.create', ['actions' => $actions]);
    }


    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'action_id' => 'required|numeric',
            'condition' => 'required|string'
        ]);

        $con = new ConditionsAction([
            'action_id' => $request->input('action_id'),
            'condition' => $request->input('condition')
        ]);
        $con->save();

        return redirect()->route('admin.content.actions.conditions_actions.edit', [
            'action_id' => $request->input('action_id'),
            'condition_id' => $con->id
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(['condition' => 'required|string']);

        ConditionsAction::where('id', $id)->update(['condition' => $request->input('condition')]);

        return back();
    }


    public function destroy($id)
    {
        $con = ConditionsAction::where('id', $id)->firstOrFail();
        $action = $con->action_id;
        $con->delete();

        return redirect()->route('admin.content.actions.actions.edit', ['action' => $action]);
    }
}
