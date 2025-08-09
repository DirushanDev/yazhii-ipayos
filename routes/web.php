<?php

use Illuminate\Support\Facades\Route;
use Yazhii\Ipayos\Http\Controllers\IpayosController;

Route::get('/ipayos', function () {
    return view('ipayos::index'); // Use view namespace
})->name('ipayos.form');
Route::post('/ipayos/init', [IpayosController::class, 'nccInitRedirect'])->name('ipayos.init');
Route::get('/ipayos/complete', [IpayosController::class, 'nccInitComplete'])->name('ipayos.complete');
