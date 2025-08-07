<?php

namespace Yazhii\Ipayos;

use Illuminate\Support\Facades\Http;

class IpayosService
{
    public function send(array $data): array
    {
        $jsonRequest = array_merge($data, [
            'clientId' => config('ipayos.client_id'),
            'token'    => config('ipayos.token'),
            'secret'   => config('ipayos.secret'),
        ]);

        $response = Http::post(config('ipayos.endpoint'), $jsonRequest);

        return $response->json();
    }
}
