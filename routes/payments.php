<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::name('payments.')->prefix('payments')->group(function() {

    Route::get('history',[PaymentController::class,'indexHistory'])->name('history');
    Route::get('{id}/show', [PaymentController::class, 'show'])->whereNumber('id')->name('show');
    
})->middleware(['verify','auth:sanctum',config('jetstream.auth_session')]);