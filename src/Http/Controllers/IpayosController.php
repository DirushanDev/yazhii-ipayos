<?php

// app/Http/Controllers/IpayosController.php
namespace Yazhii\Ipayos\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Yazhii\Ipayos\IpayosService;
use Illuminate\Support\Facades\Log;
class IpayosController extends Controller
{
    protected $ipayos;

    public function __construct(IpayosService $ipayos)
    {
        $this->ipayos = $ipayos;
    }

    public function nccInitRedirect(Request $request)
    {
        $response = $this->ipayos->nccRequest($request->only(['amount', 'email', 'mobileNumber']));
        
        if (isset($response['data']['paymentPageUrl'])) {
            return redirect()->away($response['data']['paymentPageUrl']);
        }

        return response()->json([
            'error' => 'Unable to initiate payment',
            'response' => $response
        ], 422);
    }

    public function nccInitComplete(Request $request)
    {
        if (!$request->has('requestId')) {
            return response()->json(['error' => 'Missing requestId'], 400);
        }

        $response = $this->ipayos->nccComplete($request->get('requestId'));
       
       // return response()->json($response);
        $data = is_string($response) ? json_decode($response, true) : $response;

    return view('ipayos::response', [
        'status' => $data['status'] ?? null,
        'statusDescription' => $data['statusDescription'] ?? null,
        'nccReference' => $data['data']['nccReference'] ?? null,
        'responseText' => $data['data']['responseText'] ?? null,
        'vibes' => $data['data']['vibes'] ?? null,
    ]);
    }
}
