<?php

namespace Thiio\Affirm\Handlers;

use Exception;
use Thiio\Affirm\Client;
use Thiio\Affirm\Exceptions\InvalidArgumentException;
use Thiio\Affirm\Models\Checkout;
use Thiio\Affirm\Traits\BaseResponseTrait;


class CheckoutHandler extends Client
{
    use BaseResponseTrait;

    public function __construct(string $publicKey = null, string $privateKey = null, string $environment)
    {   
        parent::__construct($publicKey, $privateKey, $environment);
    }

    public function createCheckout(Checkout $checkout) : Object
    {
        try {
            $defaultResponse = $this->getDefaultResponse();
            if ( !$checkout ) throw new InvalidArgumentException('Missing required parameter checkout');
    
            $resourcePath = 'checkout/store';
            $response = $this->makeRequest(
                $resourcePath,
                'POST',
                $checkout->serialize()
            );

            $defaultResponse->msg = 'Order created';  
            $defaultResponse->success = true;
            $defaultResponse->{'checkout'} = $response;
        } catch (Exception $e) {
            $defaultResponse->msg = 'Error trying to create Checkout';
            $defaultResponse->error = $e->getMessage();
        } finally {
            return $defaultResponse;
        }
    }

    public function fetchCheckout(string $checkoutId = null) : Object
    {
        try {
            $defaultResponse = $this->getDefaultResponse();
            if ( !$checkoutId ) throw new InvalidArgumentException('Missing required parameter checkoutId');
    
            $resourcePath = "checkout/{$checkoutId}";
            $response = $this->makeRequest(
                $resourcePath,
                'GET'
            );

            $defaultResponse->msg = 'Checkout found';  
            $defaultResponse->success = true;
            $defaultResponse->{'checkout'} = $response;
        } catch (Exception $e) {
            $defaultResponse->msg = 'Error trying to fetch Order';
            $defaultResponse->error = $e->getMessage();
        } finally {
            return $defaultResponse;
        }
    }
}