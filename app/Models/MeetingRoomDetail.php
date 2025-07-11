<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeetingRoomDetail extends Model
{
    use HasFactory;
    protected $fillable = ['check_in','check_out','meetingroom_type'];

    public function MeetingroomName(): BelongsTo
    {
        return $this->belongsTo(ProductMeetingRoom::class,'meetingroom_name');
    }

}
