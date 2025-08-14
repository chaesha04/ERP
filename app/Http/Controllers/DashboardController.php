<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function superadmin()
    {
        return view('dashboard.superadmin');
    }

    public function sales()
    {
        return view('dashboard.sales');
    }

    public function inventory()
    {
        return view('dashboard.inventory');
    }
}
