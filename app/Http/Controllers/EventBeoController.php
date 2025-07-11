<?php

namespace App\Http\Controllers;

use App\Models\EventBeo;
use Illuminate\Http\Request;

class EventBeoController extends Controller
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
        'activities.*.date' => 'required|date',
        'activities.*.start' => 'required',
        'activities.*.end' => 'required',
        'activities.*.activities' => 'required|string',
        'activities.*.place' => 'required|string',
        'activities.*.gb_id' => 'required|integer|exists:groupbooking_orders,id',
    ]);

    foreach ($request->activities as $activity) {
        EventBeo::create($activity);
    }

    // return redirect()->back();
    return redirect()->back()->with('success', 'Event BEO berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventBeo  $eventBeo
     * @return \Illuminate\Http\Response
     */
    public function show(EventBeo $eventBeo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventBeo  $eventBeo
     * @return \Illuminate\Http\Response
     */
    public function edit(EventBeo $eventBeo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventBeo  $eventBeo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventBeo $eventBeo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventBeo  $eventBeo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = EventBeo::findOrFail($id);
        $event->delete();

    return redirect()->back()->with('success', 'Event berhasil dihapus.');
    }
}
