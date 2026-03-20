<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public const USD_TO_TZS = 2800;

    /**
     * Get the price converted to TZS.
     */
    public function getTzsPriceAttribute()
    {
        return $this->price * self::USD_TO_TZS;
    }

    protected $fillable = [
        'name',
        'type',
        'price',
        'description',
        'is_available',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_available' => 'boolean',
    ];

    /**
     * Get the service orders for this service.
     */
    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class);
    }
}
