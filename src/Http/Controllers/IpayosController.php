<?php

// app/Http/Controllers/IpayosController.php
namespace Yazhii\Ipayos\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Yazhii\Ipayos\IpayosService;

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

    // public function nccInitComplete(Request $request)
    // {
    //     if (!$request->has('requestId')) {
    //         return response()->json(['error' => 'Missing requestId'], 400);
    //     }

    //     $response = $this->ipayos->nccComplete($request->get('requestId'));

    //    // return response()->json($response);
    //     return redirect()->route('ipayos.form')
    //     ->with([
    //         'message' => $response['message'] ?? 'Completed',
    //         'status' => $response['status'] ?? 'success',
    //     ]);
    // }
    public function nccInitComplete(Request $request)
{
    if (!$request->has('requestId')) {
        return redirect()->route('ipayos.form')->with([
            'message' => 'Missing requestId',
            'status' => 'error'
        ]);
    }

    // Call the NCC Complete method (your integration)
    $jsonResponse = $this->ipayos->nccComplete($request->get('requestId'));

    $responseObject = json_decode($jsonResponse);

    // Check if JSON is valid
    if (json_last_error() !== JSON_ERROR_NONE || !$responseObject) {
        return redirect()->route('ipayos.form')->with([
            'message' => 'Invalid response from payment gateway',
            'status' => 'error'
        ]);
    }

    // Extract response info
    $status = $responseObject->status ?? null;
    $description = $responseObject->statusDescription ?? 'Unknown';
    $nccReference = $responseObject->data->nccReference ?? 'N/A';
    $responseText = $responseObject->data->responseText ?? 'No response text';

    // Determine status
    if ($status === 0) {
        return redirect()->route('ipayos.form')->with([
            'message' => "Payment successful! Ref: $nccReference - $responseText",
            'status' => 'success'
        ]);
    } else {
        return redirect()->route('ipayos.form')->with([
            'message' => "Payment failed ($description). Ref: $nccReference",
            'status' => 'error'
        ]);
    }
}

}
