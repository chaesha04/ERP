<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAccomodation extends Model
{
    use HasFactory;
    protected $fillable = ['hotel_name','hotline', 'location','note'];

    public function hotelDetails()
    {
        return $this->hasMany(HotelDetail::class, 'hotel_name');
    }
}
