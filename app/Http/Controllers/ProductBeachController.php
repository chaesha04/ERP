<?php

namespace App\Http\Controllers;

use App\Models\ProductBeach;
use Illuminate\Http\Request;

class ProductBeachController extends Controller
{
    public function index()
    {
        $beaches = ProductBeach::all();
        return view('productbeach.index', compact('beaches'));
    }
    public function show($beach_name)
    {
        $beaches = ProductBeach::where('beach_name', $beach_name)->first();

        if (!$beaches) {
            abort(404);
        }

        return view('beachdetail', compact('beaches'));
    }
    public function destroy($id)
    {
        $beach = ProductBeach::findOrFail($id);
        $beach->forceDelete();

        return response()->json(['message'=>'Product Beach deleted successfully.'], 200);
    }
    public function edit($id)
    {
        $beaches = ProductBeach::findorFail($id);
        return view('beachdetailedit', compact('beaches'));
    }

        public function update(Request $request, $id)
    {
        $beach = ProductBeach::findOrFail($id);
    
        if ($request->has('location')) {
            $beach->location = $request->location;
        }
        if ($request->has('hotline')) {
            $beach->hotline = $request->hotline;
        }
        if ($request->has('web_avail')) {
            $beach->web_avail = $request->web_avail;
        }
        if ($request->has('price')) {
            $beach->price = $request->price;
        }
        if ($request->has('note')) {
            $beach->note = $request->note;
        }

        $beach->save();
    
        return redirect('/product/beach')->with('success', 'Employee updated successfully!');
    }
}
