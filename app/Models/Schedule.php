<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['ship_id', 'origin_port', 'destination_port', 'arrive_time', 'departure_time'];

    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }

    public function originPort()
    {
        return $this->belongsTo(Port::class, 'origin_port');
    }

    public function destinationPort()
    {
        return $this->belongsTo(Port::class, 'destination_port');
    }
}
