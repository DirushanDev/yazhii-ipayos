<?php

use Illuminate\Support\Facades\Route;

Route::get('/ipayos/config', function () {
    return response()->json([
        'client_id' => config('ipayos.client_id'),
        'token'     => substr(config('ipayos.token'), 0, 10) . '...',
        'secret'    => substr(config('ipayos.secret'), 0, 10) . '...',
        'endpoint'  => config('ipayos.endpoint'),
    ]);
});
