<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['ship_id', 'origin_port', 'destination_port', 'time', 'type', 'recurrence'];

    protected $casts = [
        'recurrence' => 'array',
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

    public function generateOccurrences()
    {
        $occurrences = [];
        $recurrence = $this->recurrence;

        // Validasi pola pengulangan
        if (!$recurrence || !isset($recurrence['type'])) {
            return [[
                'ship_id' => $this->ship_id,
                'origin_port' => $this->origin_port,
                'destination_port' => $this->destination_port,
                'time' => Carbon::parse($this->time)->toDateTimeString(),
                'type' => $this->type,
            ]];
        }

        // Mulai dari waktu awal
        $currentTime = Carbon::parse($this->time); // Waktu awal
        $intervalType = $recurrence['type']; // Tipe interval (daily, weekly, monthly, yearly)

        // Tentukan waktu akhir berdasarkan periode (akhir bulan atau minggu terakhir bulan tersebut)
        $endTime = $this->getEndOfPeriod($currentTime, $intervalType);

        // Tambahkan jadwal pertama
        $occurrences[] = [
            'ship_id' => $this->ship_id,
            'origin_port' => $this->origin_port,
            'destination_port' => $this->destination_port,
            'time' => $currentTime->toDateTimeString(),
            'type' => $this->type,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        // Loop untuk menghasilkan jadwal berulang
        while ($this->addInterval($currentTime, $intervalType)->lte($endTime)) {
            $occurrences[] = [
                'ship_id' => $this->ship_id,
                'origin_port' => $this->origin_port,
                'destination_port' => $this->destination_port,
                'time' => $currentTime->toDateTimeString(),
                'type' => $this->type,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        return $occurrences;
    }

    private function addInterval($currentTime, $intervalType)
    {
        // Pastikan $currentTime adalah objek Carbon
        if (!$currentTime instanceof Carbon) {
            $currentTime = Carbon::parse($currentTime);
        }

        return match ($intervalType) {
            'daily' => $currentTime->addDay(),
            'weekly' => $currentTime->addWeek(),
            'monthly' => $currentTime->addMonth(),
            'yearly' => $currentTime->addYear(),
            default => $currentTime,
        };
    }

    private function getEndOfPeriod($currentTime, $intervalType)
    {
        // Pastikan $currentTime adalah objek Carbon
        if (!$currentTime instanceof Carbon) {
            $currentTime = Carbon::parse($currentTime);
        }

        return match ($intervalType) {
            'daily', 'weekly' => $currentTime->copy()->endOfMonth(),
            'monthly' => $currentTime->copy()->addMonth()->endOfMonth(),
            'yearly' => $currentTime->copy()->addYear()->endOfYear(),
            default => $currentTime->copy()->endOfMonth(),
        };
    }
}
