<?php

namespace App\Http\Controllers;

use App\Models\GroupbookingOrder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class BanqueteventorderController extends Controller
{
    protected $fillable = [
        'note_housekeeping',
        'note_engineer',
        'note_accounting',
        'note_kitchen',
        'note_sport',
        'note_fnb',
        'note_lalassa',
    ];


}
