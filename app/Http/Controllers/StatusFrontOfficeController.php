<?php

namespace App\Http\Controllers;

use App\Models\StatusFrontOffice;
use Illuminate\Http\Request;

class StatusFrontOfficeController extends Controller
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
        $request->validate([
            'booking_id' => 'required|integer',
            'check_in' => 'nullable|date',
            'check_out' => 'nullable|date',
        ]);

        $data = [];

        if ($request->has('check_in')) {
            $data['check_in'] = $request->check_in;
        }

        if ($request->has('check_out')) {
            $data['check_out'] = $request->check_out;
        }

        // update jika sudah ada, atau create baru
        StatusFrontOffice::updateOrCreate(
            ['booking_id' => $request->booking_id],
            $data
        );

        return response()->json(['message' => 'Status berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusFrontOffice  $statusFrontOffice
     * @return \Illuminate\Http\Response
     */
    public function show(StatusFrontOffice $statusFrontOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusFrontOffice  $statusFrontOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusFrontOffice $statusFrontOffice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusFrontOffice  $statusFrontOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusFrontOffice $statusFrontOffice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusFrontOffice  $statusFrontOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusFrontOffice $statusFrontOffice)
    {
        //
    }
}
