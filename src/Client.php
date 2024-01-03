<?php

namespace Thiio\Affirm;

use Exception;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\ClientException;
use Thiio\Affirm\exceptions\ApiException;
use Thiio\Affirm\Exceptions\InvalidArgumentException;

class Client
{
    private $publicKey;
    private $privateKey;
    private $environment;

    /**
     * A map of all baseurls used in different environments and servers
     *
     * @var array
     */
    private const ENVIRONMENT_MAP = [
        "live" => "https://api.affirm.com",
        "sandbox" => "https://sandbox.affirm.com"
    ];

    public function __construct($publicKey, $privateKey, $environment = 'live')
    {    
        $this->setPublicKey($publicKey)
            ->setPrivateKey($privateKey)
            ->setEnvironment($environment);
    }

    /**
     * Get the value of publicKey
     */ 
    public function getPublicKey()
    {
        return $this->publicKey;
    }
    
    /**
     * Set the value of publicKey
     *
     * @return  self
     */ 
    public function setPublicKey($publicKey)
    {
        if ( !$publicKey  ) throw new InvalidArgumentException("publicKey is a required parameter");
        $this->publicKey = $publicKey;

        return $this;
    }

    /**
     * Get the value of privateKey
     */ 
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * Set the value of privateKey
     *
     * @return  self
     */ 
    public function setPrivateKey($privateKey)
    {
        if ( !$privateKey  ) throw new InvalidArgumentException("privateKey is a required parameter");
        $this->privateKey = $privateKey;

        return $this;
    }

    /**
     * Get the value of environment
     */ 
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Set the value of environment
     *
     * @return  self
     */ 
    public function setEnvironment($environment)
    {
        if ( !$environment  ) throw new InvalidArgumentException("environment is a required parameter");
        $this->environment = $environment;

        return $this;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return self::ENVIRONMENT_MAP[$this->environment];
    }

    public function makeRequest(string $resourcePath, string $method = 'GET', array $bodyParams = [], array $queryParams = [])
    {
        try {
            $url = "{$this->getUrl()}/api/v2/{$resourcePath}";
            $requestClient = new GuzzleHttpClient();
            
            $requestConfig = [
                'auth' => [$this->publicKey, $this->privateKey],
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ];

            if ( $bodyParams ) {
                $requestConfig['json'] = $bodyParams;
            }

            if ( $queryParams ) {
                $requestConfig['query'] = $queryParams;
            }

            $response = $requestClient->request($method, $url, $requestConfig);
            return json_decode($response->getBody(), true);
        } catch (ClientException $e) {
            throw new ApiException($this->handleErrorResponse($e));
        } catch (Exception $e) {
            throw new ApiException($e->getMessage());
        }
    }

    private function buildQueryParams(array $queryParams)
    {
        $params = '';
        if ( !count($queryParams) ) return $params;

        foreach ( $queryParams as $key => $val ) {
            $params = $params === '' ? "?{$key}={$val}" : "{$params}&{$key}={$val}";
        }

        return $params;
    }

    private function handleErrorResponse(ClientException $error)
    {
        if ( !$error->hasResponse() ) return $error->getMessage();

        $statusCode = $error->getResponse()->getStatusCode();
        switch ($statusCode) {
            case 404:
                $errorMessage = '404 Resource not found';
                break;
            case 401:
                $errorMessage = '401 Unauthorized';
                break;
            case 400:
                $errorMessage = '400 Bad request';
                break;
            default:
                $errorMessage = "{$statusCode} Unknown error occurred";
                break;
        }
        
        return "{$errorMessage}{$this->handleBodyResponseErrors($error)}";
    }

    private function handleBodyResponseErrors(ClientException $error)
    {
        if ( !$error->getResponse()->getBody() ) return '';
        $responseBody = json_decode((string)$error->getResponse()->getBody());

        return $responseBody->message ? ": {$responseBody->message}" : '';
    }
}