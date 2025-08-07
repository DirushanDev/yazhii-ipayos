<?php
// app/Services/IpayosService.php
namespace Yazhii\Ipayos;

use Yazhii\Ipayos\Traits\HasRestClient;

class IpayosService
{
    use HasRestClient;

    public function nccRequest(array $data): array
    {
        $jsonRequest = [
            'clientId' => config('ipayos.client_id'),
            'token' => config('ipayos.token'),
            'secret' => config('ipayos.secret'),
            'requestType' => 'NCC_INIT',
            'transactionAmount' => $data['amount'],
            'msisdn' => $data['mobileNumber'],
            'email' => $data['email'],
            'clientReference' => 'test001',
            'redirectUrl' => route('ipayos.complete'),
        ];

        return $this->sendRestRequest(config('ipayos.apiendpoint'), $jsonRequest);
    }

    public function nccComplete(string $requestId): array
    {
        $jsonRequest = [
            'clientId' => config('ipayos.client_id'),
            'token' => config('ipayos.token'),
            'secret' => config('ipayos.secret'),
            'requestType' => 'NCC_COMPLETE',
            'requestId' => $requestId,
        ];

        return $this->sendRestRequest(config('ipayos.apiendpoint'), $jsonRequest);
    }
}
