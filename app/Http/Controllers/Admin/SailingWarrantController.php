<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SailingWarrant;
use App\Http\Requests\StoreSailingWarrantRequest;
use App\Http\Requests\UpdateSailingWarrantRequest;
use App\Models\Port;
use App\Models\Schedule;
use App\Models\Ship;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\Facades\DataTables;

class SailingWarrantController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view sailing warrant'), only: ['index']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create sailing warrant'), only: ['create', 'store']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('show sailing warrant'), only: ['show']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit sailing warrant'), only: ['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete sailing warrant'), only: ['destroy']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('export sailing warrant'), only: ['report']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $sailingwarrants = SailingWarrant::latest()->get();
            return DataTables::of($sailingwarrants)
                ->addIndexColumn()
                ->addColumn('ship', function ($row) {
                    return $row->schedule->ship ? $row->schedule->ship->name : '-';
                })
                ->addColumn('action', 'admin.sailing-warrant.include.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.sailing-warrant.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schedules = Schedule::where('type', 2)->with('originPort', 'destinationPort')->latest()->get();

        return view('admin.sailing-warrant.create', compact('schedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSailingWarrantRequest $request)
    {
        try {
            $attr = $request->validated();

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $filename = $request->file('file')->hashName();

                $request->file('file')->storeAs('upload/spb/', $filename, 'public');

                $attr['file'] = $filename;
            }

            SailingWarrant::create($attr);

            return redirect()->route('admin.sailingwarrant.index')->with('success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sailingwarrant.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SailingWarrant $sailingwarrant)
    {
        $sailingwarrant->load('schedule');
        return view('admin.sailing-warrant.show', compact('sailingwarrant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SailingWarrant $sailingwarrant)
    {
        $schedules = Schedule::where('type', 2)->with('originPort', 'destinationPort')->latest()->get();
        return view('admin.sailing-warrant.edit', compact('sailingwarrant', 'schedules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSailingWarrantRequest $request, SailingWarrant $sailingwarrant)
    {
        try {
            $attr = $request->validated();

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $path = storage_path('app/public/upload/spb/');
                $filename = $request->file('file')->hashName();

                // delete old file from storage
                if ($sailingwarrant->file != null && file_exists($path . $sailingwarrant->file)) {
                    unlink($path . $sailingwarrant->file);
                }

                $request->file('file')->storeAs('upload/spb/', $filename, 'public');

                $attr['file'] = $filename;
            }

            $sailingwarrant->update($attr);

            return redirect()
                ->route('admin.sailingwarrant.index')
                ->with('success', __('Data Berhasil Diubah'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.sailingwarrant.index')
                ->with('error', __($th->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SailingWarrant $sailingwarrant)
    {
        try {

            $path = storage_path('app/public/upload/spb/');

            if ($sailingwarrant->file != null && file_exists($path . $sailingwarrant->file)) {
                unlink($path . $sailingwarrant->file);
            }

            $sailingwarrant->delete();

            return redirect()
                ->route('admin.sailingwarrant.index')
                ->with('success', __('Data Berhasil Dihapus'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.sailingwarrant.index')
                ->with('error', __($th->getMessage()));
        }
    }

    public function report(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $letter_number = $request->letter_number;
        $letter_date = $request->letter_date;
        $official_name = $request->official_name;
        $official_nip = $request->official_nip;

        $sailingWarrants = SailingWarrant::with('schedule')
            ->whereHas('schedule', function ($query) use ($month, $year) {
                $query->whereMonth('time', $month)
                    ->whereYear('time', $year);
            })
            ->get();

        $shipsOver500Count = $sailingWarrants->filter(function ($warrant) {
            return $warrant->schedule->ship->weight > 500;
        })->count();
        $shipsUnder500Count = $sailingWarrants->filter(function ($warrant) {
            $warrant->schedule->ship->weight < 500;
        })->count();
        $indonesianShipsCount = $sailingWarrants->filter(function ($warrant) {
            return strtolower($warrant->schedule->ship->flag) === 'indonesia';
        })->count();

        $pdf = Pdf::loadView('admin.sailing-warrant.report', compact('sailingWarrants', 'month', 'year', 'letter_number', 'letter_date', 'official_name', 'official_nip', 'shipsOver500Count', 'shipsUnder500Count', 'indonesianShipsCount'))->setPaper('A4', 'landscape');

        if ($month && $year) {
            return $pdf->stream('laporan-spb.pdf');
        } else {
            return redirect()->back()->with('toast_error', 'Maaf, tidak bisa export data');
        }
    }
}
