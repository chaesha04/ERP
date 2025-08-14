<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BreakdownBeo extends Model
{
    use HasFactory;
    protected $fillable = [
        'product',
        'price',
        'unit',
        'night',
        'total_price',
        'gb_id'
    ];
        public function GroupBookingOrder():BelongsTo{
        return $this->belongsTo(GroupbookingOrder::class, 'gb_id', 'id');
    }
   
}
