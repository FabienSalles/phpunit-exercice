<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice;

final class Math
{
    private const SCALE = 10;

    public float $number = 0;

    public function sum(float $value): void
    {
        $this->number = (float) bcadd((string) $this->number, (string) $value, self::SCALE);
    }

    public function subtract(float $value): void
    {
        $this->number = (float) bcsub((string) $this->number, (string) $value, self::SCALE);
    }

    public function multiply(float $value): void
    {
        $this->number = (float) bcmul((string) $this->number, (string) $value, self::SCALE);
    }

    public function divide(float $value): void
    {
        $this->number = (float) bcdiv((string) $this->number, (string) $value, self::SCALE);
    }
}
