<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_title',
        'description',
        'room_type',
        'price',
        'free_wifi',
        'image',
    ];
}
