<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductBeach;

class BeachController extends Controller
{
    public function index(){
        
        $beaches = ProductBeach::all();
        return view('inventorymodule.index', compact('beaches'));
    }
}
