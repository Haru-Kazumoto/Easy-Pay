<?php

use App\Http\Controllers\BillsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum','verified', config('jetstream.auth_session')])->group(function() {
    Route::resource('bills', BillsController::class);
});