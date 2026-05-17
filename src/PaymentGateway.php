<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice;

interface PaymentGateway
{
    /**
     * Charge le montant et retourne un identifiant de transaction.
     */
    public function charge(float $amount): string;
}
