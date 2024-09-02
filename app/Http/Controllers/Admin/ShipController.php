<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use App\Http\Requests\StoreShipRequest;
use App\Http\Requests\UpdateShipRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\Facades\DataTables;

class ShipController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view ship'), only: ['index']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create ship'), only: ['create', 'store']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit ship'), only: ['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete ship'), only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $ships = Ship::latest()->get();
            return DataTables::of($ships)
                ->addIndexColumn()
                ->addColumn('action', 'admin.ship.include.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.ship.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ship.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShipRequest $request)
    {
        try {
            $attr = $request->validated();

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $filename = $request->file('photo')->hashName();

                $request->file('photo')->storeAs('upload/kapal/', $filename, 'public');

                $attr['photo'] = $filename;
            }

            Ship::create($attr);

            return redirect()->route('admin.ship.index')->with('success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.ship.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ship $ship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ship $ship)
    {
        return view('admin.ship.edit', compact('ship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShipRequest $request, Ship $ship)
    {
        try {
            $attr = $request->validated();

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $path = storage_path('app/public/upload/kapal/');
                $filename = $request->file('photo')->hashName();

                // delete old file from storage
                if ($ship->photo != null && file_exists($path . $ship->photo)) {
                    unlink($path . $ship->photo);
                }

                $request->file('photo')->storeAs('upload/kapal/', $filename, 'public');

                $attr['photo'] = $filename;
            }

            $ship->update($attr);

            return redirect()
                ->route('admin.ship.index')
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
    public function destroy(Ship $ship)
    {
        try {

            $path = storage_path('app/public/upload/kapal/');

            if ($ship->photo != null && file_exists($path . $ship->photo)) {
                unlink($path . $ship->photo);
            }

            $ship->delete();

            return redirect()
                ->route('admin.ship.index')
                ->with('success', __('Data Berhasil Dihapus'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.ship.index')
                ->with('error', __($th->getMessage()));
        }
    }
}
