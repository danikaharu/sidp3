<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    // Dashboard
    Route::get('/dashboard', ['App\Http\Controllers\Admin\DashboardController', 'index'])->name('dashboard');

    // Activity
    Route::resource('activity', App\Http\Controllers\Admin\ActivityController::class);

    // Port
    Route::resource('port', App\Http\Controllers\Admin\PortController::class);

    // Ship
    Route::resource('ship', App\Http\Controllers\Admin\ShipController::class);

    // Schedule
    // Route::resource('schedule', App\Http\Controllers\Admin\ScheduleController::class);
    Route::get('/schedules/{type}', [App\Http\Controllers\Admin\ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('/schedules/create/{type}', [App\Http\Controllers\Admin\ScheduleController::class, 'create'])->name('schedules.create');
    Route::post('/schedules/store', [App\Http\Controllers\Admin\ScheduleController::class, 'store'])->name('schedules.store');
    Route::get('/schedules/{schedule}/edit', [App\Http\Controllers\Admin\ScheduleController::class, 'edit'])->name('schedules.edit');
    Route::put('/schedules/{schedule}', [App\Http\Controllers\Admin\ScheduleController::class, 'update'])->name('schedules.update');
    Route::delete('/schedules/{schedule}', [App\Http\Controllers\Admin\ScheduleController::class, 'destroy'])->name('schedules.destroy');
    Route::get('/schedules/detail/{ship_id}/{type}/{month}/{year}', [App\Http\Controllers\Admin\ScheduleController::class, 'detailShip'])->name('schedules.detailShip');

    // Sailing Warrant
    Route::resource('sailingwarrant', App\Http\Controllers\Admin\SailingWarrantController::class);
    Route::get('/sailingwarrants/report', [App\Http\Controllers\Admin\SailingWarrantController::class, 'report'])->name('sailingwarrants.report');

    // Manifest
    Route::resource('manifest', App\Http\Controllers\Admin\ManifestController::class);
    Route::get('/manifests/report/month', [App\Http\Controllers\Admin\ManifestController::class, 'reportByMonth'])->name('manifests.report.byMonth');
    Route::get('/manifests/report/ship', [App\Http\Controllers\Admin\ManifestController::class, 'reportByShip'])->name('manifests.report.byShip');
    Route::get('/manifests/get-schedules', [App\Http\Controllers\Admin\ManifestController::class, 'getSchedules'])->name('manifests.get.schedules');

    // Cargo
    Route::resource('cargo', App\Http\Controllers\Admin\CargoController::class);
    Route::get('/cargos/detail/{manifest_id}', [App\Http\Controllers\Admin\CargoController::class, 'detailManifest'])->name('cargos.detailManifest');
    Route::get('/cargos/create/{manifest_id}', [App\Http\Controllers\Admin\CargoController::class, 'create'])->name('cargos.create');

    // User
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);

    // Role
    Route::resource('role', App\Http\Controllers\Admin\RoleController::class);

    // Profile 
    Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
});
