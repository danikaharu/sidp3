<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SailingWarrant extends Model
{
    use HasFactory;

    protected $fillable = [
        'ship_id',
        'type',
        'arrive_time',
        'departure_time',
        'origin_port',
        'destination_port',
        'file'
    ];

    public function ship()
    {
        return $this->belongsTo(Ship::class);
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
