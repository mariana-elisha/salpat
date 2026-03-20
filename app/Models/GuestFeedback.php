<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuestFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'guest_name',
        'rating',
        'comments',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
