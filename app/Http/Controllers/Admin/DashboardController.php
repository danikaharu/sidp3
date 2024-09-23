<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Ship;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ship = Ship::latest()->first();
        $activity = Activity::latest()->first();

        return view('admin.dashboard.index', compact('activity', 'ship'));
    }
}
