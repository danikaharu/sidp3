<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManifestRequest;
use App\Http\Requests\UpdateManifestRequest;
use App\Models\Manifest;
use App\Models\Schedule;
use App\Models\Ship;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ManifestController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view manifest'), only: ['index']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create manifest'), only: ['create', 'store']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('show manifest'), only: ['show']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit manifest'), only: ['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete manifest'), only: ['destroy']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('export manifest'), only: ['reportByMonth']),
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $manifests = Manifest::with('schedule')->latest()->get();
            return DataTables::of($manifests)
                ->addIndexColumn()
                ->addColumn('type', function ($row) {
                    return $row->type();
                })
                ->addColumn('ship', function ($row) {
                    return $row->schedule ? $row->schedule->ship->name : '-';
                })
                ->addColumn('action', 'admin.manifest.include.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        $ships = Ship::all();
        return view('admin.manifest.index', compact('ships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schedules = Schedule::with('ship')->latest()->get();
        return view('admin.manifest.create', compact('schedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManifestRequest $request)
    {
        try {
            $attr = $request->validated();

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $filename = $request->file('file')->hashName();

                $request->file('file')->storeAs('upload/manifest/', $filename, 'public');

                $attr['file'] = $filename;
            }

            Manifest::create($attr);

            return redirect()->route('admin.manifest.index')->with('success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.manifest.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Manifest $manifest)
    {
        $manifest->load('schedule');
        return view('admin.manifest.show', compact('manifest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manifest $manifest)
    {
        $schedules = Schedule::with('ship')->latest()->get();
        return view('admin.manifest.edit', compact('schedules', 'manifest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManifestRequest $request, Manifest $manifest)
    {
        try {
            $attr = $request->validated();

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $path = storage_path('app/public/upload/manifest/');
                $filename = $request->file('file')->hashName();

                // delete old file from storage
                if ($manifest->file != null && file_exists($path . $manifest->file)) {
                    unlink($path . $manifest->file);
                }

                $request->file('file')->storeAs('upload/manifest/', $filename, 'public');

                $attr['file'] = $filename;
            }

            $manifest->update($attr);

            return redirect()
                ->route('admin.manifest.index')
                ->with('success', __('Data Berhasil Diubah'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.manifest.index')
                ->with('error', __($th->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manifest $manifest)
    {
        try {
            $path = storage_path('app/public/upload/manifest/');

            if ($manifest->file != null && file_exists($path . $manifest->file)) {
                unlink($path . $manifest->file);
            }

            $manifest->delete();

            return redirect()
                ->route('admin.manifest.index')
                ->with('success', __('Data Berhasil Dihapus'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.manifest.index')
                ->with('error', __($th->getMessage()));
        }
    }

    public function reportByShip(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $ship = $request->ship_id;
        $letter_number = $request->letter_number;
        $letter_date = $request->letter_date;

        $ships = Ship::find($ship);

        $fmt = new \IntlDateFormatter('id_ID', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE, null, null, 'MMMM');
        $date = DateTime::createFromFormat('!m', $month);
        $month_name = strtoupper($fmt->format($date));

        $manifests = Manifest::with('schedule')
            ->whereHas('schedule', function ($query) use ($month, $year, $ship) {
                $query->whereMonth('arrive_time', $month)
                    ->whereYear('arrive_time', $year)
                    ->where('ship_id', $ship);
            })
            ->get();

        $pdf = Pdf::loadView('admin.manifest.report.by-ship', compact('manifests', 'month_name', 'year', 'letter_number', 'letter_date'))->setPaper('8.5x14', 'landscape');

        if ($month && $year && $ship) {
            return $pdf->stream('LAPORAN DATPRO' . $ships->name . '_' . $month . '_' . $year . ' SATPEL PPG.pdf');
        } else {
            return redirect()->back()->with('toast_error', 'Maaf, tidak bisa export data');
        }
    }

    public function reportByMonth(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $letter_number = $request->letter_number;
        $letter_date = $request->letter_date;

        $fmt = new \IntlDateFormatter('id_ID', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE, null, null, 'MMMM');
        $date = DateTime::createFromFormat('!m', $month);
        $month_name = $fmt->format($date);

        $manifests = Manifest::select(
            'type',
            'origin_ports.name as origin_port_name',
            'destination_ports.name as destination_port_name',
            'ships.name as ship_name',
            'ships.weight as ship_weight',
            'ships.passenger_capacity as ship_passenger_capacity',
            'ships.vehicle_capacity as ship_vehicle_capacity',
            DB::raw('COUNT(manifests.id) as trip'),
            DB::raw('SUM(adult_passenger) as adult_passenger'),
            DB::raw('SUM(child_passenger) as child_passenger'),
            DB::raw('SUM(vehicle_passenger) as vehicle_passenger'),
            DB::raw('SUM(adult_passenger + child_passenger + vehicle_passenger) as total_passenger'),
            DB::raw('SUM(group_I) as total_group_I'),
            DB::raw('SUM(group_II) as total_group_II'),
            DB::raw('SUM(group_III) as total_group_III'),
            DB::raw('SUM(group_IVA + group_IVB) as total_group_IV'),
            DB::raw('SUM(group_VA + group_VB) as total_group_V'),
            DB::raw('SUM(group_VIA + group_VIB) as total_group_VI'),
            DB::raw('SUM(group_VII) as total_group_VII'),
            DB::raw('SUM(group_VIII) as total_group_VIII'),
            DB::raw('SUM(group_IX) as total_group_IX'),
            DB::raw('SUM(group_I + group_II + group_III + group_IVA + group_IVB + group_VA + group_VB + group_VIA + group_VIB + group_VII + group_VIII + group_IX) as total_all_groups'),
            DB::raw('SUM(bulk_goods) as total_bulk_goods')
        )
            ->join('schedules', 'manifests.schedule_id', '=', 'schedules.id')
            ->join('ships', 'schedules.ship_id', '=', 'ships.id')
            ->join('ports as origin_ports', 'schedules.origin_port', '=', 'origin_ports.id')
            ->join('ports as destination_ports', 'schedules.destination_port', '=', 'destination_ports.id')
            ->groupBy(
                'type',
                'origin_ports.name',
                'destination_ports.name',
                'ships.name',
                'ships.weight',
                'ships.passenger_capacity',
                'ships.vehicle_capacity'
            )
            ->get();

        $pdf = Pdf::loadView('admin.manifest.report.by-month', compact('manifests', 'month_name', 'year', 'letter_number', 'letter_date'))->setPaper('8.5x14', 'landscape');

        if ($month && $year) {
            return $pdf->stream('laporan produksi_' . $month_name . '_' . $year . '.pdf');
        } else {
            return redirect()->back()->with('toast_error', 'Maaf, tidak bisa export data');
        }
    }
}
