<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use App\Models\Manifest;
use Carbon\Carbon;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\Facades\DataTables;

class CargoController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view cargo'), only: ['index']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create cargo'), only: ['create', 'store']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit cargo'), only: ['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete cargo'), only: ['destroy']),
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
                    return $row->schedule->ship ? $row->schedule->ship->name : '-';
                })
                ->addColumn('port', function ($row) {
                    return $row->schedule->originPort->name . '-' . $row->schedule->destinationPort->name;
                })
                ->addColumn('time', function ($row) {
                    return Carbon::parse($row->schedule->time)->format('F Y');
                })
                ->addColumn('action', 'admin.cargo.include.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.cargo.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($manifest_id)
    {
        return view('admin.cargo.create', compact('manifest_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCargoRequest $request)
    {
        try {
            $attr = $request->validated();

            Cargo::create($attr);

            return redirect()->route('admin.cargos.detailManifest', ['manifest_id' => $request->manifest_id])->with('success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.cargos.detailManifest', ['manifest_id' => $request->manifest_id])->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cargo $cargo)
    {
        return view('admin.cargo.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCargoRequest $request, Cargo $cargo)
    {
        try {
            $attr = $request->validated();

            $cargo->update($attr);

            return redirect()
                ->route('admin.cargo.index')
                ->with('success', __('Data Berhasil Diubah'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.cargo.index')
                ->with('error', __($th->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cargo $cargo)
    {
        try {
            $cargo->delete();

            return redirect()->route('admin.cargos.detailManifest', ['manifest_id' => $cargo->manifest_id])->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('admin.cargos.detailManifest', ['manifest_id' => $cargo->manifest_id])->with('error', $th->getMessage());
        }
    }

    public function detailManifest($manifest_id)
    {
        $cargos = Cargo::where('manifest_id', $manifest_id)->get();
        return view('admin.cargo.detail', compact('cargos', 'manifest_id'));
    }
}
