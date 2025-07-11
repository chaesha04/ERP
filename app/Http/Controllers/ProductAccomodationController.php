<?php

namespace App\Http\Controllers;

use App\Models\ProductAccomodation;
use Illuminate\Http\Request;

class ProductAccomodationController extends Controller
{
    public function index()
    {
        $accomodations = ProductAccomodation::all();
        return view('accomodation.index', compact('accomodations'));
    }

    public function show($hotel_id)
    {
        // Cari akomodasi berdasarkan nama
        $accomodation = ProductAccomodation::where('id', $hotel_id)->first();

        if (!$accomodation) {
            abort(404);
        }

        // Ambil hotel detail yang berelasi
        $hotelDetails = $accomodation->hotelDetails;

        return view('accommodationdetail', compact('accomodation', 'hotelDetails'));
    }
    public function show_addnew($id)
    {
        // Cari akomodasi berdasarkan nama
        $accomodation = ProductAccomodation::where('id', $id)->first();

        if (!$accomodation) {
            abort(404);
        }

        // Ambil hotel detail yang berelasi
        $hotelDetails = $accomodation->hotelDetails;

        return view('accommodationdetail', compact('accomodation', 'hotelDetails'));
    }

    public function destroy($id)
    {
        $accomodation = ProductAccomodation::findOrFail($id);
        $accomodation->forceDelete();
        return response()->json(['message'=>'Product Accommodation delete successfully!']);
    }

        public function edit($id)
    {
        $accommodation = ProductAccomodation::findorFail($id);
        return view('accommodationdetailedit', compact('accommodation'));
    }
        public function update(Request $request, $id)
    {
        $accommodation = ProductAccomodation::findOrFail($id);
        
        if ($request->has('note')) {
            $accommodation->note = $request->note;
        }
        if ($request->has('location')) {
            $accommodation->location = $request->location;
        }
        if ($request->has('hotline')) {
            $accommodation->hotline = $request->hotline;
        }
        if ($request->has('hotel_name')) {
            $accommodation->hotel_name = $request->hotel_name;
        }

        $accommodation->save();

        return redirect('/product/accommodation')->with('success', 'Product accommodation updated successfully!');
    }
        public function createRoomType($id)
    {
        $accommodation = ProductAccomodation::findOrFail($id);
        return view('addnewroomtype', compact('accommodation'));
    }

}
