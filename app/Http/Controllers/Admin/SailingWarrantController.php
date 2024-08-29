<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SailingWarrant;
use App\Http\Requests\StoreSailingWarrantRequest;
use App\Http\Requests\UpdateSailingWarrantRequest;
use App\Models\Port;
use App\Models\Ship;
use Yajra\DataTables\Facades\DataTables;

class SailingWarrantController extends Controller
{
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
                    return $row->ship ? $row->ship->name : '-';
                })
                ->addColumn('type', function ($row) {
                    return $row->type();
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
        $ships = Ship::all();
        $ports = Port::all();
        return view('admin.sailing-warrant.create', compact('ships', 'ports'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SailingWarrant $sailingwarrant)
    {
        $ships = Ship::all();
        $ports = Port::all();
        return view('admin.sailing-warrant.edit', compact('sailingwarrant', 'ships', 'ports'));
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
}
