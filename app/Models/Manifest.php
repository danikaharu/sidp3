<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manifest extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'type',
        'adult_passenger',
        'child_passenger',
        'vehicle_passenger',
        'group_I',
        'group_II',
        'group_III',
        'group_IVA',
        'group_IVB',
        'group_VA',
        'group_VB',
        'group_VIA',
        'group_VIB',
        'group_VII',
        'group_VIII',
        'group_IX',
        'load_factor_passenger',
        'load_factor_vehicle',
        'bulk_goods',
        'description_bulk_goods',
        'situation',
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
