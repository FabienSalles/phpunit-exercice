<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice\Tests;

use Conveycode\PhpunitExercice\Cart;
use Conveycode\PhpunitExercice\PaymentGateway;
use Conveycode\PhpunitExercice\Product;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;

final class CartCheckoutTest extends TestCase
{
    use ProphecyTrait;

    public function testCheckoutChargesGatewayWithCartTotal(): void
    {
        $gateway = $this->prophesize(PaymentGateway::class);
        $gateway->charge(Argument::any())->willReturn('tx-123');

        $cart = new Cart([
            new Product('a', 30),
            new Product('b', 20),
        ]);

        $cart->checkout($gateway->reveal());

        $gateway->charge(50.0)->shouldHaveBeenCalled();
    }

    public function testCheckoutReturnsTransactionIdFromGateway(): void
    {
        $gateway = $this->prophesize(PaymentGateway::class);
        $gateway->charge(Argument::any())->willReturn('tx-abc');
        $cart = new Cart([new Product('a', 10)]);

        $transactionId = $cart->checkout($gateway->reveal());

        self::assertSame('tx-abc', $transactionId);
    }
}
