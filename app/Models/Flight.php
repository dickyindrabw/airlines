<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'from', 'to', 'departure_time', 'arrival_time'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
