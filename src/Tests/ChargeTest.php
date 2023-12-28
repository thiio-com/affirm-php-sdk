<?php

namespace Thiio\Affirm\Test;

use PHPUnit\Framework\TestCase;
use Thiio\Affirm\Handlers\ChargeHandler;

final class ChargeTest extends TestCase
{
    private const PUBLIC_KEY = '';
    private const PRIVATE_KEY = '';
    private const ENVIRONMENT = 'sandbox';

    private $chargeHandler;

    /**
     * PHPunit setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->chargeHandler = new ChargeHandler(self::PUBLIC_KEY, self::PRIVATE_KEY, self::ENVIRONMENT);
    }

    /**
     * @test
     */
    public function itShouldBuildChargeHandler() : void
    {
        $this->assertInstanceOf(ChargeHandler::class, $this->chargeHandler);
    }

    /**
     * @test
     */
    public function itShouldThrowAnErrorIfCheckoutTokenIsNotSetOnAuthorize() : void
    {
        $response = $this->chargeHandler->authorizeCharge();
        $this->assertEquals('Missing required parameter checkoutToken', $response->error);
    }

    /**
     * @test
     */
    public function itShouldAuthorizeCharge() : void
    {
        $responseAuthorizeCharge = $this->chargeHandler->authorizeCharge('C9CBATHCDUZND6FP');
        $this->assertNotNull($responseAuthorizeCharge->charge->id);

        $responseCaptureCharge = $this->chargeHandler->captureCharge($responseAuthorizeCharge->charge->id);
        $this->assertNotNull($responseAuthorizeCharge->charge->id);


        var_dump($responseCaptureCharge->charge);
    }
}
