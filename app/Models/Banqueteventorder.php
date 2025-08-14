<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banqueteventorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'note_housekeeping',
        'note_engineer',
        'note_accounting',
        'note_kitchen',
        'note_sport',
        'note_fnb',
        'note_lalassa',
        'gb_id',
    ];

    public function GroupBookingOrder(): BelongsTo
    {
        return $this->belongsTo(GroupbookingOrder::class, 'gb_id', 'id');
    }
}
