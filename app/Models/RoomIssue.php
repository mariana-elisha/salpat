<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'reported_by',
        'description',
        'status',
    ];

    /**
     * Get the room associated with this issue.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Get the user who reported the issue.
     */
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
}
