<?php

namespace App\Http\Controllers;

use App\Models\ProductActivity;
use Illuminate\Http\Request;

class ProductActivityController extends Controller
{
    public function index() {
        $activities = ProductActivity::all();
        return view('activites.index', compact('activities'));
    }

        public function edit($id)
    {
        $item = ProductActivity::findorFail($id);
        return view('watersportedit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ProductActivity::findOrFail($id);
    
        if ($request->has('watersport')) {
            $item->watersport = $request->watersport; // ✅ ganti 'location' jadi 'watersport'
        }
        if ($request->has('price')) {
            $item->price = $request->price;
        }
        if ($request->has('note')) {
            $item->note = $request->note;
        }
    
        $item->save();
    
        return redirect('/product/watersport')->with('success', 'Product updated successfully!');
    }

    public function destroy($id){
        $item = ProductActivity::findOrFail($id);
        $item->forceDelete();

        return response()->json(['message'=>'Product Activity deleted successfully'],200);
    }
    
}
