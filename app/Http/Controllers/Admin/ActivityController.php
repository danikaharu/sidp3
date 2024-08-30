<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use Yajra\DataTables\Facades\DataTables;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $activies = Activity::latest()->get();
            return DataTables::of($activies)
                ->addIndexColumn()
                ->addColumn('action', 'admin.activity.include.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.activity.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        try {
            $attr = $request->validated();

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $filename = $request->file('photo')->hashName();

                $request->file('photo')->storeAs('upload/kegiatan/', $filename, 'public');

                $attr['photo'] = $filename;
            }

            Activity::create($attr);

            return redirect()->route('admin.activity.index')->with('success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.activity.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        return view('admin.activity.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        try {
            $attr = $request->validated();

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $path = storage_path('app/public/upload/kegiatan/');
                $filename = $request->file('photo')->hashName();

                // delete old file from storage
                if ($activity->photo != null && file_exists($path . $activity->photo)) {
                    unlink($path . $activity->photo);
                }

                $request->file('photo')->storeAs('upload/kegiatan/', $filename, 'public');

                $attr['photo'] = $filename;
            }

            $activity->update($attr);

            return redirect()
                ->route('admin.activity.index')
                ->with('success', __('Data Berhasil Diubah'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.activity.index')
                ->with('error', __($th->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        try {

            $path = storage_path('app/public/upload/kegiatan/');

            if ($activity->photo != null && file_exists($path . $activity->photo)) {
                unlink($path . $activity->photo);
            }

            $activity->delete();

            return redirect()
                ->route('admin.activity.index')
                ->with('success', __('Data Berhasil Dihapus'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.activity.index')
                ->with('error', __($th->getMessage()));
        }
    }
}
