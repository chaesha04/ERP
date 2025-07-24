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
            $validated = $request->validate([
                'booking_id' => 'required|exists:bookings,id',
                'check_in' => 'nullable|date',
                'check_out' => 'nullable|date',
            ]);

            // Cek apakah data untuk booking_id sudah ada
            $status = StatusFrontOffice::firstOrNew(['booking_id' => $validated['booking_id']]);

            // Update nilai yang dikirim (bisa salah satu atau dua-duanya)
            if (isset($validated['check_in'])) {
                $status->check_in = $validated['check_in'];
            }

            if (isset($validated['check_out'])) {
                $status->check_out = $validated['check_out'];
            }

            $status->save();

            return response()->json(['message' => 'Status updated successfully.']);
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
