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

    public function getTotal(): float
    {
        $total = 0.0;
        foreach ($this->products as $product) {
            $total += $product->price;
        }

        return $total;
    }

    /**
     * Procède au paiement via la passerelle externe.
     * Retourne l'identifiant de transaction.
     */
    public function checkout(PaymentGateway $gateway): string
    {
        return $gateway->charge($this->getTotal());
    }
}
