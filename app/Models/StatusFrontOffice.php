<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusFrontOffice extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id','check_in', 'check_out'];

    public function booking() // bukan BookingID
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

}
