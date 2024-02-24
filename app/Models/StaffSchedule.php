<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'start_time',
        'end_time',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
