<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Port;
use App\Models\Ship;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\Facades\DataTables;

class ScheduleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view schedule'), only: ['index']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create schedule'), only: ['create', 'store']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit schedule'), only: ['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete schedule'), only: ['destroy']),
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $schedules = Schedule::with('ship', 'originPort', 'destinationPort')->latest()->get();
            return DataTables::of($schedules)
                ->addIndexColumn()
                ->addColumn('ship', function ($row) {
                    return $row->ship ? $row->ship->name : '-';
                })
                ->addColumn('port', function ($row) {
                    return $row->originPort->name . '-' . $row->destinationPort->name;
                })
                ->addColumn('action', 'admin.schedule.include.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.schedule.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ships = Ship::all();
        $ports = Port::all();
        return view('admin.schedule.create', compact('ships', 'ports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        try {
            $attr = $request->validated();

            Schedule::create($attr);

            return redirect()->route('admin.schedule.index')->with('success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.schedule.index')->with('error', $th->getMessage());
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
                ->route('admin.schedule.index')
                ->with('success', __('Data Berhasil Diubah'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.port.index')
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
                ->route('admin.schedule.index')
                ->with('success', __('Data Berhasil Dihapus'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.schedule.index')
                ->with('error', __($th->getMessage()));
        }
    }
}
