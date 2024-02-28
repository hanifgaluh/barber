<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_customer', 'hair_artist', 'date', 'time', 'price', 'store'
    ];
}
