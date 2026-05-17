<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice;

final class Math
{
    public float $number = 0;

    public function sum(float $value): void
    {
        $this->number += $value;
    }

    public function subtract(float $value): void
    {
        $this->number -= $value;
    }

    public function multiply(float $value): void
    {
        $this->number *= $value;
    }

    public function divide(float $value): void
    {
        $this->number /= $value;
    }
}
