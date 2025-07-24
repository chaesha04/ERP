<?php

namespace App\Http\Controllers;

use App\Models\TicketOrder;
use Illuminate\Http\Request;

class BeachTicketERPController extends Controller
{
    public function index(Request $request)
    {
        $query = TicketOrder::query(); 

        if ($request->has('field') && $request->has('keyword')) {
            $field = $request->input('field');
            $keyword = $request->input('keyword');
            $query->where($field, 'LIKE', "%$keyword%");
        } 

        $beachorderweb = $query->paginate(20);

        return view('bnr_beach', compact('beachorderweb'), [
            'title' => 'Beach | Website Order'
        ]);
    }
    public function detail($order_code){
        $seedetail = TicketOrder::where('order_code', $order_code)->first();

        if (!$seedetail) {
            abort(404);
        }

        return view('bnr_beachdetail', compact('seedetail'), [
            'title' => 'Accommodation | Website Detail'
        ]);
    }

}
