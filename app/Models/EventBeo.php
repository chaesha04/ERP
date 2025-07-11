<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventBeo extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'date',
        'start',
        'end',
        'activities',
        'place',
        'gb_id'
    ];

    public function GroupBookingOrder():BelongsTo{
        return $this->belongsTo(GroupbookingOrder::class, 'gb_id', 'id');
    }
}
