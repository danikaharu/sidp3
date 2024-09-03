<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SailingWarrant extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'print_number',
        'arrive_number',
        'departure_number',
        'situation',
        'file'
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
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
