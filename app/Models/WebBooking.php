<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebBooking extends Model
{
    use HasFactory;
    
    protected $table = 'bookings'; // Nama tabel sebenarnya
    
    protected $fillable = [
        'code', 'hotel_id', 'first_name', 'last_name', 
        'check_in', 'check_out', 'adults', 'child'
    ];
}