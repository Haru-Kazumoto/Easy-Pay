<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// hook the login method to use route from admin prefix
Route::post('/admin/login', [AuthenticatedSessionController::class,'store'])->name('admin.login');