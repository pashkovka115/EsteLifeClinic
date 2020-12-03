<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    #все товары
    public function index()
    {
        return view('admin.products.products.index');
    }
    
}
