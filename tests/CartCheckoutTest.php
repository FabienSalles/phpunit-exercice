<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice\Tests;

use Conveycode\PhpunitExercice\Cart;
use Conveycode\PhpunitExercice\PaymentGateway;
use Conveycode\PhpunitExercice\Product;
use PHPUnit\Framework\TestCase;

final class CartCheckoutTest extends TestCase
{
    public function testCheckoutChargesGatewayWithCartTotal(): void
    {
        $gateway = $this->createMock(PaymentGateway::class);
        $gateway
            ->expects($this->once())
            ->method('charge')
            ->with(50.0)
            ->willReturn('tx-123');

        $cart = new Cart([
            new Product('a', 30),
            new Product('b', 20),
        ]);

        $cart->checkout($gateway);
    }

    public function testCheckoutReturnsTransactionIdFromGateway(): void
    {
        $gateway = $this->createMock(PaymentGateway::class);
        $gateway->method('charge')->willReturn('tx-abc');
        $cart = new Cart([new Product('a', 10)]);

        $transactionId = $cart->checkout($gateway);

        self::assertSame('tx-abc', $transactionId);
    }
}
