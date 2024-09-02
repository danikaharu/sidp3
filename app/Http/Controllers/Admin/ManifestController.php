<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManifestRequest;
use App\Http\Requests\UpdateManifestRequest;
use App\Models\Manifest;
use App\Models\Ship;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
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
            $manifests = Manifest::with('ship')->latest()->get();
            return DataTables::of($manifests)
                ->addIndexColumn()
                ->addColumn('type', function ($row) {
                    return $row->type();
                })
                ->addColumn('ship', function ($row) {
                    return $row->ship ? $row->ship->name : '-';
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
        $ships = Ship::all();
        return view('admin.manifest.create', compact('ships'));
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
        $ships = Ship::all();
        return view('admin.manifest.edit', compact('ships', 'manifest'));
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

    public function reportByMonth(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $letter_number = $request->letter_number;
        $letter_date = $request->letter_date;

        $startDate = Carbon::create($year, $month, 1);
        $endDate = $startDate->copy()->endOfMonth();

        $dates = [];
        while ($startDate->lte($endDate)) {
            $dates[] = $startDate->copy();
            $startDate->addDay();
        }

        $manifests = Manifest::with('ship')
            ->where('ship_id', $request->ship_id)
            ->get();

        // Kelompokkan data berdasarkan tanggal yang relevan
        $dataByDate = [];
        foreach ($dates as $date) {
            $dataByDate[$date->format('Y-m-d')] = $manifests->filter(function ($item) use ($date) {
                return Carbon::parse($item->created_at)->format('Y-m-d') == $date->format('Y-m-d');
            });
        }

        // Persiapkan data untuk tampilan
        $reportData = array_map(function ($date) use ($dataByDate) {
            return [
                'date' => $date->format('Y-m-d'),
                'data' => $dataByDate[$date->format('Y-m-d')] ?? collect()
            ];
        }, $dates);

        $pdf = Pdf::loadView('admin.manifest.report.by-ship', compact('reportData', 'month', 'year', 'letter_number', 'letter_date'))->setPaper('F4', 'landscape');

        if ($month && $year) {
            return $pdf->stream('laporan-produksi.pdf');
        } else {
            return redirect()->back()->with('toast_error', 'Maaf, tidak bisa export data');
        }
    }
}
