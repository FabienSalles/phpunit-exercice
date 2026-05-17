<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice;

final class Product
{
    public function __construct(
        public readonly string $name,
        public readonly float $price,
    ) {
    }
}
