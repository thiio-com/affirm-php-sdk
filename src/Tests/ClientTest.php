<?php

namespace Thiio\Affirm\Test;

use PHPUnit\Framework\TestCase;
use Thiio\Affirm\Client;
use Thiio\Affirm\Exceptions\InvalidArgumentException;


final class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function buildClient(): void
    {
        $client = new Client("publicKey", "secretKey");
        $this->assertInstanceOf(Client::class, $client);
    }
}