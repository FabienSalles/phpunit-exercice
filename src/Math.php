<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice;

final class Math
{
    private const SCALE = 10;

    public static function sum(float $a, float $b): float
    {
        return (float) bcadd((string) $a, (string) $b, self::SCALE);
    }

    public static function subtract(float $a, float $b): float
    {
        return (float) bcsub((string) $a, (string) $b, self::SCALE);
    }

    public static function multiply(float $a, float $b): float
    {
        return (float) bcmul((string) $a, (string) $b, self::SCALE);
    }

    public static function divide(float $a, float $b): float
    {
        return (float) bcdiv((string) $a, (string) $b, self::SCALE);
    }
}
