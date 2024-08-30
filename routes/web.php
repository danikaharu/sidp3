<?php


use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    // Dashboard
    Route::get('/dashboard', ['App\Http\Controllers\Admin\DashboardController', 'index'])->name('dashboard');

    // Activity
    Route::resource('activity', App\Http\Controllers\Admin\ActivityController::class);

    // Port
    Route::resource('port', App\Http\Controllers\Admin\PortController::class);

    // Ship
    Route::resource('ship', App\Http\Controllers\Admin\ShipController::class);

    // Schedule
    Route::resource('schedule', App\Http\Controllers\Admin\ScheduleController::class);

    // Sailing Warrant
    Route::resource('sailingwarrant', App\Http\Controllers\Admin\SailingWarrantController::class);

    // Manifest
    Route::resource('manifest', App\Http\Controllers\Admin\ManifestController::class);
});
