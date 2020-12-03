<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use File;
use App\Imports\SupplierImport;

class SuppliersController extends Controller
{
    public function index()
    {
        return view('admin.products.suppliers.index');
    }

    public function import()
    {
        // dd(public_path().'/viz.xlsx');
        // $path = File::get('viz.xlsx');
        // $rows = Excel::import(new CsvImport, $path);
        // dd($rows);

        Excel::import(new SupplierImport, public_path().'/viz.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }
}
