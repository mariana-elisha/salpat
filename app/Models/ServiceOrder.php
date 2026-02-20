<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'room_id',
        'quantity',
        'total_price',
        'status',
        'requested_at',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'requested_at' => 'datetime',
    ];

    /**
     * Get the user that placed the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the service being ordered.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the room associated with the order.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
