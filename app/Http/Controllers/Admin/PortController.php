<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Port;
use App\Http\Requests\StorePortRequest;
use App\Http\Requests\UpdatePortRequest;
use Yajra\DataTables\Facades\DataTables;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $ports = Port::latest()->get();
            return DataTables::of($ports)
                ->addIndexColumn()
                ->addColumn('action', 'admin.port.include.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.port.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.port.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortRequest $request)
    {
        try {
            $attr = $request->validated();

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $filename = $request->file('photo')->hashName();

                $request->file('photo')->storeAs('upload/pelabuhan/', $filename, 'public');

                $attr['photo'] = $filename;
            }

            Port::create($attr);

            return redirect()->route('admin.port.index')->with('success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.port.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Port $port) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Port $port)
    {
        return view('admin.port.edit', compact('port'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortRequest $request, Port $port)
    {
        try {
            $attr = $request->validated();

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $path = storage_path('app/public/upload/pelabuhan/');
                $filename = $request->file('photo')->hashName();

                // delete old file from storage
                if ($port->photo != null && file_exists($path . $port->photo)) {
                    unlink($path . $port->photo);
                }

                $request->file('photo')->storeAs('upload/pelabuhan/', $filename, 'public');

                $attr['photo'] = $filename;
            }

            $port->update($attr);

            return redirect()
                ->route('admin.port.index')
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
    public function destroy(Port $port)
    {
        try {

            $path = storage_path('app/public/upload/pelabuhan/');

            if ($port->photo != null && file_exists($path . $port->photo)) {
                unlink($path . $port->photo);
            }

            $port->delete();

            return redirect()
                ->route('admin.port.index')
                ->with('success', __('Data Berhasil Dihapus'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.port.index')
                ->with('error', __($th->getMessage()));
        }
    }
}
