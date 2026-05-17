<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice;

final class Cart
{
    /**
     * @param list<Product> $products
     */
    public function __construct(
        private readonly array $products = [],
    ) {
    }

    public function getProductCartPrices(): float
    {
        $productsTotal = 0.0;
        foreach ($this->products as $product) {
            $productsTotal = Math::sum($productsTotal, $product->price);
        }

        return Math::sum($productsTotal, $this->getShippingCost($productsTotal));
    }

    private function getShippingCost(float $productsTotal): float
    {
        return match (true) {
            $productsTotal < 100 => 15.5,
            $productsTotal === 100.0 => 15.0,
            default => 10.0,
        };
    }
}
