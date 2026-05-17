<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice\Tests;

use Conveycode\PhpunitExercice\Cart;
use Conveycode\PhpunitExercice\Product;
use PHPUnit\Framework\TestCase;

final class CartTest extends TestCase
{
    public function testEmptyCartGetsHighShippingCost(): void
    {
        $cart = new Cart([]);

        self::assertSame(15.5, $cart->getProductCartPrices());
    }

    public function testCartUnder100GetsHighShippingCost(): void
    {
        $cart = new Cart([
            new Product('a', 30),
            new Product('b', 40),
        ]);

        self::assertSame(85.5, $cart->getProductCartPrices());
    }

    public function testCartAtExactly100GetsMediumShippingCost(): void
    {
        $cart = new Cart([
            new Product('a', 50),
            new Product('b', 50),
        ]);

        self::assertSame(115.0, $cart->getProductCartPrices());
    }

    public function testCartAbove100GetsLowShippingCost(): void
    {
        $cart = new Cart([
            new Product('a', 100),
            new Product('b', 50),
        ]);

        self::assertSame(160.0, $cart->getProductCartPrices());
    }

    public function testCartWithFloatingPrecisionEqualsExactly100(): void
    {
        $cart = new Cart([
            new Product('a', 80.1),
            new Product('b', 10.1),
            new Product('c', 9.8),
        ]);

        self::assertSame(115.0, $cart->getProductCartPrices());
    }
}
