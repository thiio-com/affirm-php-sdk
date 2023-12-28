<?php

namespace Thiio\Affirm\Test;

use PHPUnit\Framework\TestCase;
use Thiio\Affirm\Handlers\CheckoutHandler;

final class CheckoutTest extends TestCase
{
    private const PUBLIC_KEY = '';
    private const PRIVATE_KEY = '';
    private const ENVIRONMENT = 'sandbox';

    private $checkoutHandler;

    /**
     * PHPunit setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->checkoutHandler = new CheckoutHandler(self::PUBLIC_KEY, self::PRIVATE_KEY, self::ENVIRONMENT);
    }

    /**
     * @test
     */
    public function itShouldBuildcheckoutHandler() : void
    {
        $this->assertInstanceOf(CheckoutHandler::class, $this->checkoutHandler);
    }

    /**
     * @test
     */
    public function itShouldThrowAnErrorIfCheckoutIdIsNotSet() : void
    {
        $response = $this->checkoutHandler->fetchCheckout();
        $this->assertEquals('Missing required parameter checkoutId', $response->error);
    }

    /**
     * @test
     */
    public function itShouldFetchAnCheckout() : void
    {

        $responseFetchOrder = $this->checkoutHandler->fetchCheckout('3AMTRWJGNTZETMAY');
        var_dump($responseFetchOrder->checkout);
        // $this->assertEquals($responseCreateOrder->order->getId(), $responseFetchOrder->order->getId());
    }
}
