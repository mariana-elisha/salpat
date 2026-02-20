<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_id',
        'guest_name',
        'guest_email',
        'guest_phone',
        'contact_preference',
        'check_in',
        'check_out',
        'number_of_guests',
        'total_price',
        'status',
        'special_requests',
        'booking_reference',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'total_price' => 'decimal:2',
    ];

    /**
     * Get the room that this booking belongs to.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Get the user that made this booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate a unique booking reference.
     */
    public static function generateBookingReference()
    {
        do {
            $reference = 'BK' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
        } while (self::where('booking_reference', $reference)->exists());

        return $reference;
    }

    /**
     * Calculate number of nights.
     */
    public function getNumberOfNightsAttribute()
    {
        return $this->check_in->diffInDays($this->check_out);
    }
}
