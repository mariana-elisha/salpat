<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public const USD_TO_TZS = 2800;

    /**
     * Get the price converted to TZS.
     */
    public function getTzsPriceAttribute()
    {
        if ($this->resident_price_per_night > 0) {
            return $this->resident_price_per_night;
        }
        return $this->price_per_night * self::USD_TO_TZS;
    }

    protected $fillable = [
        'room_number',
        'name',
        'description',
        'type',
        'capacity',
        'price_per_night',
        'resident_price_per_night',
        'image',
        'images',
        'amenities',
        'is_available',
        'housekeeping_status',
    ];

    protected $casts = [
        'amenities' => 'array',
        'images' => 'array',
        'is_available' => 'boolean',
        'price_per_night' => 'decimal:2',
        'resident_price_per_night' => 'decimal:2',
        'housekeeping_status' => 'string',
    ];

    /**
     * Get all bookings for this room.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get all service orders for this room.
     */
    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class);
    }

    /**
     * Check if room is available for given dates.
     */
    public function isAvailableForDates($checkIn, $checkOut, $excludeBookingId = null)
    {
        if (!$this->is_available) {
            return false;
        }

        $query = $this->bookings()
            ->where('status', '!=', 'cancelled');

        if ($excludeBookingId) {
            $query->where('id', '!=', $excludeBookingId);
        }

        return !$query->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    });
            })
            ->exists();
    }
    /**
     * Check if the room is currently occupied by a confirmed guest.
     */
    public function getIsOccupiedAttribute()
    {
        return $this->bookings()
            ->where('status', 'confirmed')
            ->where('check_in', '<=', today())
            ->where('check_out', '>=', today())
            ->exists();
    }

    /**
     * Get time remaining until checkout if occupied.
     */
    public function getTimeRemainingAttribute()
    {
        $currentBooking = $this->bookings()
            ->where('status', 'confirmed')
            ->where('check_in', '<=', today())
            ->where('check_out', '>=', today())
            ->first();

        if (!$currentBooking) {
            return null;
        }

        // Standard checkout time is 11:00 AM on the check_out date
        $checkoutTime = \Carbon\Carbon::parse($currentBooking->check_out)->setTime(11, 0, 0);
        $now = now();

        if ($now->greaterThan($checkoutTime)) {
            return 'Overdue by ' . $checkoutTime->diffForHumans($now, true);
        }

        return $checkoutTime->diffForHumans($now, true, false, 2) . ' remaining';
    }
}
