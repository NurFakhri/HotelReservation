<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
