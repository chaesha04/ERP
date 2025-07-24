<?php

namespace App\Http\Controllers;

use App\Models\GroupbookingOrder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class BanqueteventorderController extends Controller
{
public function store(Request $request, $id)
{
    $validated = $request->validate([
        'note_housekeeping' => 'nullable|string',
        'note_engineer' => 'nullable|string',
        'note_accounting' => 'nullable|string',
        'note_kitchen' => 'nullable|string',
        'note_sport' => 'nullable|string',
        'note_fnb' => 'nullable|string',
        'note_lalassa' => 'nullable|string',
    ]);

    // Cek apakah sudah ada note BEO sebelumnya
    $existing = \App\Models\Banqueteventorder::where('gb_id', $id)->first();

    if ($existing) {
        $existing->update($validated);
    } else {
        $validated['gb_id'] = $id;
        \App\Models\Banqueteventorder::create($validated);
    }
    return redirect('/bookingandreservation/groupbookingorder/' . $id .'/admissiondetail')->with('success', 'Note saved!');

}

}
