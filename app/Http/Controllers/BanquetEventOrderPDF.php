<?php

namespace App\Http\Controllers;

use App\Models\BreakdownBeo;
use App\Models\EventBeo;
use Illuminate\Http\Request;
use App\Models\GroupBookingDetail;
use App\Models\GroupbookingOrder;
use Barryvdh\DomPDF\Facade\Pdf;

class BanquetEventOrderPDF extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            // Ambil data dari database
        $groupbooking = GroupbookingOrder::with([
                'VisitorDetail',
                'SalesDetail',
                'NoteBEO',
                'ProductDetail',
                'EventBEO'
            ])->findOrFail($id);

            // Ambil semua breakdown berdasarkan gb_id
            $data = BreakdownBeo::where('gb_id', $id)->get();
            $event = EventBeo::where('gb_id', $id)->get();

            $pdf = Pdf::loadView('pdf.banqueteventorder', compact('groupbooking', 'data' , 'event'));

            return $pdf->download('BanquetEventOrder.pdf');
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
