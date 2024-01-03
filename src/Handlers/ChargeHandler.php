<?php

namespace Thiio\Affirm\Handlers;

use Exception;
use Thiio\Affirm\Client;
use Thiio\Affirm\Exceptions\ApiException;
use Thiio\Affirm\Exceptions\InvalidArgumentException;
use Thiio\Affirm\Traits\BaseResponseTrait;


class ChargeHandler extends Client
{
    use BaseResponseTrait;

    public function __construct(string $publicKey = null, string $privateKey = null, string $environment)
    {   
        parent::__construct($publicKey, $privateKey, $environment);
    }

    public function authorizeCharge(string $checkoutToken = null) : Object
    {
        try {
            $defaultResponse = $this->getDefaultResponse();
            if ( !$checkoutToken ) throw new InvalidArgumentException('Missing required parameter checkoutToken');
    
            $resourcePath = 'charges';
            $response = $this->makeRequest(
                $resourcePath,
                'POST',
                [
                    'checkout_token' => $checkoutToken
                ]
            );

            $defaultResponse->msg = 'Charge authorized';  
            $defaultResponse->success = true;
            $defaultResponse->{'charge'} = (Object)$response;
        } catch (Exception | ApiException $e) {
            $defaultResponse->msg = 'Error trying to authorize Charge';
            $defaultResponse->error = $e->getMessage();
        } finally {
            return $defaultResponse;
        }
    }

    public function captureCharge(string $chargeId = null, Array $extraParams = []) : Object
    {
        try {
            $defaultResponse = $this->getDefaultResponse();
            if ( !$chargeId ) throw new InvalidArgumentException('Missing required parameter chargeId');
    
            $resourcePath = "charges/{$chargeId}/capture";
            $response = $this->makeRequest(
                $resourcePath,
                'POST',
                $extraParams
            );

            $defaultResponse->msg = 'Charge captured';  
            $defaultResponse->success = true;
            $defaultResponse->{'charge'} = (Object)$response;
        } catch (Exception | ApiException $e) {
            $defaultResponse->msg = 'Error trying to capture Charge';
            $defaultResponse->error = $e->getMessage();
        } finally {
            return $defaultResponse;
        }
    }

    public function refundCharge(string $chargeId = null, int $amount = null) : Object 
    {
        try {
            $defaultResponse = $this->getDefaultResponse();
            if ( !$chargeId ) throw new InvalidArgumentException('Missing required parameter chargeId');
            if ( !$amount ) throw new InvalidArgumentException('Missing required parameter amount');
    
            $resourcePath = "charges/{$chargeId}/refund";
            $response = $this->makeRequest(
                $resourcePath,
                'POST', 
                [
                    'amount' => $amount
                ]
            );

            $defaultResponse->msg = 'Charge refunded';  
            $defaultResponse->success = true;
            $defaultResponse->{'charge'} = (Object)$response;
        } catch (Exception | ApiException $e) {
            $defaultResponse->msg = 'Error trying to refund Charge';
            $defaultResponse->error = $e->getMessage();
        } finally {
            return $defaultResponse;
        }
    }

    public function voidCharge(string $chargeId = null) : Object 
    {
        try {
            $defaultResponse = $this->getDefaultResponse();
            if ( !$chargeId ) throw new InvalidArgumentException('Missing required parameter chargeId');
    
            $resourcePath = "charges/{$chargeId}/void";
            $response = $this->makeRequest(
                $resourcePath,
                'POST'
            );

            $defaultResponse->msg = 'Charge voided';  
            $defaultResponse->success = true;
            $defaultResponse->{'charge'} = (Object)$response;
        } catch (Exception | ApiException $e) {
            $defaultResponse->msg = 'Error trying to void Charge';
            $defaultResponse->error = $e->getMessage();
        } finally {
            return $defaultResponse;
        }
    }
}