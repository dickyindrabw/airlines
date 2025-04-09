<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_id', 'passenger_name', 'passenger_phone', 'seat_number', 'boarding_time'
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
