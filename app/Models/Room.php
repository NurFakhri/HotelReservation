<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'type',
        'description',
        'price',
        'image',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
