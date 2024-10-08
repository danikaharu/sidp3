<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    protected $fillable = [
        'name',
        'call_sign',
        'passenger_capacity',
        'vehicle_capacity',
        'weight',
        'flag',
        'skipper',
        'company',
        'imo_number',
        'crew_number',
        'photo',
    ];
}
