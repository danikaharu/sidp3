<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manifest;
use App\Http\Requests\StoreManifestRequest;
use App\Http\Requests\UpdateManifestRequest;
use App\Models\Schedule;
use Yajra\DataTables\Facades\DataTables;

class ManifestController extends Controller
{
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
                    return $row->schedule->ship ? $row->schedule->ship->name : '-';
                })
                ->addColumn('schedule', function ($row) {
                    return $row->schedule ? $row->schedule->time : '-';
                })
                ->addColumn('action', 'admin.manifest.include.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.manifest.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schedules = Schedule::all();
        return view('admin.manifest.create', compact('schedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManifestRequest $request)
    {
        try {
            $attr = $request->validated();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manifest $manifest)
    {
        $schedules = Schedule::all();
        return view('admin.manifest.edit', compact('schedules', 'manifest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManifestRequest $request, Manifest $manifest)
    {
        try {
            $attr = $request->validated();

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
}
