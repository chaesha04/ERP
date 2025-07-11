<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GroupbookingOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'check_in',
        'check_out',
        'event_type',
        'hotel_id',
        'qty_room',
        'extrabed',
        'adult',
        'child',
        'baby',
        'night',
        'rate_desc',
        'package',
        'single_room',
        'twin_room',
        'triple_room',
        'child_room',
        'singleroom_price',
        'twinroom_price',
        'tripleroom_price',
        'childroom_price',
        'grand_total',
        'deposit',
        'sales_id',
        'group_id',
    ];
    public function SalesDetail(): BelongsTo{
        return $this->belongsTo(Employee::class, 'sales_id','id');
    }
    public function VisitorDetail(): BelongsTo{
        return $this->belongsTo(VisitorDetail::class, 'group_id','id');
    }
    public function ProductDetail(): BelongsTo{
        return $this->belongsTo(ProductAccomodation::class, 'hotel_id');
    }

    public function NoteBEO(): HasOne{
        return $this->hasOne(BanquetEventOrder::class, 'gb_id','id');
    }
    public function EventBEO(): HasMany{
        return $this->hasMany(EventBeo::class, 'gb_id','id');
    }
    public function BreakdownBeo(): HasMany{
        return $this->hasMany(BreakdownBeo::class, 'gb_id','id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'groupbooking_id');
    }


public static function boot()
{
    parent::boot();
static::creating(function ($model) {
    $last = self::orderBy('id', 'desc')->first();
    $number = $last ? $last->id + 1 : 1;
    $formattedNumber = str_pad($number, 4, '0', STR_PAD_LEFT);

    $customPart = "CL-JSO";
    $sales_id = $model->sales_id ?? 'UNKNOWN';
    $salesformattedNumber = str_pad($sales_id, 2, '0', STR_PAD_LEFT);
    $year = Carbon::now()->format('Y');

    // Ambil data hotel berdasarkan hotel_id
    $hotel = ProductAccomodation::find($model->hotel_id);
    $hotelName = strtolower($hotel->hotel_name ?? '');

    $hotelCode = match($hotelName) {
        'tanjung lesung beach hotel' => 'TLBH',
        'ladda bay village' => 'LBV',
        'lalassa beach club' => 'LLS',
        'kalicaa villa' => 'KV',
        default => 'UNKNOWN',
    };

    $model->slug = "{$formattedNumber}/{$customPart}-{$salesformattedNumber}/{$hotelCode}/X-{$year}";
});

}

}
