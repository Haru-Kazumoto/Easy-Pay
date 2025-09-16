<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

$middlewares = ['auth:sanctum',config('jetstream.auth_session'), 'verified'];

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware($middlewares)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showUserDashboard'])->name('dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'showAdminDashboard'])->name('dashboard.admin');
    Route::get('/superadmin/dashboard', [DashboardController::class, 'showSuperdminDashboard'])->name('dashboard.superadmin');
});
