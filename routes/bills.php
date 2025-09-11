<?php

use App\Http\Controllers\BillsController;
use Illuminate\Support\Facades\Route;

Route::name('bills.')->prefix('bills')->group(function() {
    Route::get('', [BillsController::class, 'index'])->name('index');
    Route::get('{id}', [BillsController::class, 'show'])->name('show');
})->middleware(['auth:sanctum','verified', config('jetstream.auth_session')]);