<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SailingWarrant extends Model
{
    use HasFactory;

    protected $fillable = [
        'print_number',
        'ship_id',
        'arrive_number',
        'departure_number',
        'arrive_time',
        'departure_time',
        'origin_port',
        'destination_port',
        'situation',
        'file'
    ];

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

    public function type()
    {
        if ($this->type == 1) {
            return 'Kedatangan';
        } else {
            return 'Keberangkatan';
        }
    }
}
