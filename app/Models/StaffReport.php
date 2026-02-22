<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'section',
        'report_type',
        'report_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
