<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorDetail;

class VisitorDetailController extends Controller
{
    public function index(Request $request)
    {
        $query = VisitorDetail::query(); 

        if ($request->has('field') && $request->has('keyword')) {
            $field = $request->input('field');
            $keyword = $request->input('keyword');
            $query->where($field, 'LIKE', "%$keyword%");
        } 

        $visitorDetail = $query->paginate(25);

        return view('visitor_detail', compact('visitorDetail'), [
            'title' => 'Customer Data'
        ]);
    }
}
