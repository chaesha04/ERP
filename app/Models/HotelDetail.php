<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HotelDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'accommodation_id',
        'room_type',
        'bedroom_qty',
        'unit',
        'extra_facility'
    ];

    public function productAccommodation(){
        return $this->belongsTo(ProductAccomodation::class, 'accommodation_id','id');
    }
}

