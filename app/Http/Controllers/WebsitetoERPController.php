<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class WebsitetoERPController extends Controller
{
        public function index(Request $request)
    {
        $query = Booking::query(); 

        if ($request->has('field') && $request->has('keyword')) {
            $field = $request->input('field');
            $keyword = $request->input('keyword');
            $query->where($field, 'LIKE', "%$keyword%");
        } 

        $webBooking = $query->paginate(20);

        return view('bnr_accommodation', compact('webBooking'), [
            'title' => 'Accommodation | Website Order'
        ]);
    }
        public function detail($id){
            $seedetail = Booking::where('id', $id)->first();

            if(!$seedetail){
                abort(404);
            };

            return view('bnr_accommodationdetail', compact('seedetail'),['title' => 'Accommodation | Website Detail']);
        }
}
