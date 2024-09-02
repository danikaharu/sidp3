<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

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
    Route::get('/sailingwarrants/report', [App\Http\Controllers\Admin\SailingWarrantController::class, 'report'])->name('sailingwarrants.report');

    // Manifest
    Route::resource('manifest', App\Http\Controllers\Admin\ManifestController::class);
    Route::get('/manifests/report/month', [App\Http\Controllers\Admin\ManifestController::class, 'reportByMonth'])->name('manifests.report.byMonth');

    // User
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);

    // Role
    Route::resource('role', App\Http\Controllers\Admin\RoleController::class);
});
