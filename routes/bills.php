<?php

use Illuminate\Support\Facades\Route;

$auth_session = config('jetstream.auth_session');

// Route::name('bills')
//     ->middleware(['verified', $auth_session, 'auth:sanctum'])
//     ->group(function() {
//     Route::resource('bill', []);
// });