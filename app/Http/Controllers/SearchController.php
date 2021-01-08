<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'required|string'
        ]);
        $search = $request->input('search');

        $doctors = \DB::table('doctors')
            ->select(\DB::raw("id, name, slug, '' as description, 'doctor' as 'table'"))
            ->where('name', 'like', "%$search%");

        $services = \DB::table('services')
            ->select(\DB::raw("id, name, slug, description, 'service' as 'table'"))
            ->where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%");

        $results = $doctors->union($services)->get();

        return view('pages.search.index', ['results' => $results]);
    }
}
