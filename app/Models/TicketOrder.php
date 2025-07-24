<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\TicketPayment;

class TicketOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'beach_ticket_id',
        'ticket_customer_id', 
        'customer_name',
        'customer_email',
        'customer_phone',
        'visit_date',
        'quantity',
        'additional_request',
        'subtotal',
        'discount',
        'total_price',
        'promo_code_id',
        'payment_method',
        'payment_status',
        'amount_tendered',
        'transaction_id',
        'paid_at',
        'cashier_id',
        'is_offline_order',
    ];

    protected $casts = [
        'visit_date' => 'date',
        'paid_at' => 'datetime',
        'is_offline_order' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        // Auto-generate order code when creating a new order
        static::creating(function ($order) {
            $order->order_code = 'TIX-' . strtoupper(Str::random(8));
        });
    }

//     public function ticket()
//     {
//         return $this->belongsTo(BeachTicket::class, 'beach_ticket_id');
//     }

//     public function promoCode()
//     {
//         return $this->belongsTo(PromoCode::class, 'promo_code_id');
//     }

//     public function cashier()
//     {
//         return $this->belongsTo(User::class, 'cashier_id');
//     }
//     public function payment()
//     {
//         return $this->hasOne(TicketPayment::class, 'order_code', 'order_code');
//     }
    
//     public function getFormattedTotalPriceAttribute()
//     {
//         return 'Rp. ' . number_format($this->total_price, 0, ',', '.');
//     }
    
//     public function getFormattedVisitDateAttribute()
//     {
//         return $this->visit_date->format('d F Y');
//     }
}