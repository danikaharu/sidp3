<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Port;
use App\Models\Ship;
use Carbon\Carbon;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\Facades\DataTables;

class ScheduleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view schedule arrival|view schedule departure'), only: ['index']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create schedule'), only: ['create', 'store']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit schedule'), only: ['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete schedule'), only: ['destroy']),
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        $schedules = Schedule::with('ship', 'originPort', 'destinationPort')
            ->selectRaw('ship_id, type, MONTH(time) as month, MAX(origin_port) as origin_port, MAX(destination_port) as destination_port, MAX(time) as time')
            ->groupBy('ship_id', 'type', 'month');

        // Menyesuaikan berdasarkan type yang dipilih (departure atau arrival)
        if ($type == 1) {
            $schedules = $schedules->where('type', 1);  // Mengambil jadwal kedatangan
        } elseif ($type == 2) {
            $schedules = $schedules->where('type', 2);  // Mengambil jadwal keberangkatan
        }

        $schedules = $schedules->get();

        if (request()->ajax()) {

            return DataTables::of($schedules)
                ->addIndexColumn()
                ->addColumn('ship', function ($row) {
                    return $row->ship ? $row->ship->name : '-';
                })
                ->addColumn('port', function ($row) {
                    return $row->originPort->name . '-' . $row->destinationPort->name;
                })
                ->addColumn('time', function ($row) {
                    return Carbon::parse($row->time)->format('F Y');
                })
                ->addColumn('action', 'admin.schedule.include.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.schedule.index', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type)
    {
        $ships = Ship::all();
        $ports = Port::all();
        return view('admin.schedule.create', compact('ships', 'ports', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        try {
            // Buat model jadwal
            $schedule = new Schedule();
            $schedule->ship_id = $request->ship_id;
            $schedule->origin_port = $request->origin_port;
            $schedule->destination_port = $request->destination_port;
            $schedule->time = $request->time;
            $schedule->type = $request->type;
            $schedule->recurrence = $request->recurrence;

            // Hasilkan jadwal berulang
            $occurrences = $schedule->generateOccurrences();

            Schedule::insert($occurrences);

            return redirect()->route('admin.schedules.index', ['type' => $request->type])->with('success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.schedules.index', ['type' => $request->type])->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $ships = Ship::all();
        $ports = Port::all();
        return view('admin.schedule.edit', compact('schedule', 'ships', 'ports'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        try {
            $attr = $request->validated();

            $schedule->update($attr);

            return redirect()
                ->back()
                ->with('success', __('Data Berhasil Diubah'));
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('error', __($th->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        try {

            $schedule->delete();

            return redirect()
                ->back()
                ->with('success', __('Data Berhasil Dihapus'));
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('error', __($th->getMessage()));
        }
    }

    public function detailShip($ship_id, $type, $month, $year)
    {
        // Ambil seluruh jadwal berdasarkan ship_id dan bulan/tahun
        $schedules = Schedule::with('ship', 'originPort', 'destinationPort')
            ->where('ship_id', $ship_id)
            ->where('type', $type)
            ->whereMonth('time', $month)
            ->whereYear('time', $year)
            ->orderBy('time')
            ->get();

        // Menampilkan view dengan jadwal yang telah diambil
        return view('admin.schedule.detail', compact('schedules'));
    }
}
