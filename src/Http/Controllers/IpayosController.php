<?php

namespace Yazhii\Ipayos\Http\Controllers;

use Illuminate\Routing\Controller;
use Yazhii\Ipayos\Traits\RestClientTrait;

class IpayosController extends Controller
{
    use RestClientTrait;

    public function sendPayment()
    {
        $jsonRequest = [
            'clientId' => config('ipayos.clientId'),
            'token'    => config('ipayos.token'),
            'secret'   => config('ipayos.secret'),
        ];

        $url = 'https://gateway.ipayos.lk/ncc_controller.php';
        $response = $this->sendRequest($url, $jsonRequest);

        return response()->json([
            'status' => 'success',
            'response' => json_decode($response, true),
        ]);
    }
}
