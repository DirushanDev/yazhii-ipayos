<?php

use Illuminate\Support\Facades\Route;
use Yazhii\Ipayos\Http\Controllers\IpayosController;
Route::get('/ipayos/config', function () {
    return response()->json([
        'client_id' => config('ipayos.client_id'),
        'token'     => substr(config('ipayos.token'), 0, 10) . '...',
        'secret'    => substr(config('ipayos.secret'), 0, 10) . '...',
        'endpoint'  => config('ipayos.apiendpoint'),
    ]);
});

Route::get('/ipayos', function () {
    return view('ipayos::index'); // Use view namespace
})->name('ipayos.form');
Route::post('/ipayos/init', [IpayosController::class, 'nccInitRedirect'])->name('ipayos.init');
Route::get('/ipayos/complete', [IpayosController::class, 'nccInitComplete'])->name('ipayos.complete');
