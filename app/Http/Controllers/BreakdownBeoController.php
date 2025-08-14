<?php

namespace App\Http\Controllers;

use App\Models\BreakdownBeo;
use Illuminate\Http\Request;

class BreakdownBeoController extends Controller
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
        $validates = $request->validate([
            'breakdown.*.product' => 'required|string',
            'breakdown.*.price' => 'required|integer',
            'breakdown.*.unit' => 'required|integer',
            'breakdown.*.night' => 'required|integer',
            'breakdown.*.total_price' => 'required|integer',
        ]);

        foreach($request->breakdown as $additem){
            BreakdownBeo::create($additem);
        }
        return redirect()->back()->with('success', 'Event BEO berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BreakdownBeo  $breakdownBeo
     * @return \Illuminate\Http\Response
     */
    public function show(BreakdownBeo $breakdownBeo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BreakdownBeo  $breakdownBeo
     * @return \Illuminate\Http\Response
     */
    public function edit(BreakdownBeo $breakdownBeo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BreakdownBeo  $breakdownBeo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BreakdownBeo $breakdownBeo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BreakdownBeo  $breakdownBeo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $breakdown = BreakdownBeo::findOrFail($id);
        $breakdown->delete();

    return redirect()->back()->with('success', 'Event berhasil dihapus.');
    }
}
