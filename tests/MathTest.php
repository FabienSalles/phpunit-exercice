<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice\Tests;

use Conveycode\PhpunitExercice\Math;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class MathTest extends TestCase
{
    public function testNumberIsInitializedToZero(): void
    {
        $math = new Math();

        self::assertSame(0.0, $math->number);
    }

    #[DataProvider('provideSumCases')]
    public function testSumAddsValueToNumber(float $initial, float $value, float $expected): void
    {
        $math = new Math();
        $math->number = $initial;

        $math->sum($value);

        self::assertSame($expected, $math->number);
    }

    public static function provideSumCases(): \Generator
    {
        yield '0 + 5 = 5' => ['initial' => 0, 'value' => 5, 'expected' => 5];
        yield '10 + 5 = 15' => ['initial' => 10, 'value' => 5, 'expected' => 15];
        yield '0 + 0 = 0' => ['initial' => 0, 'value' => 0, 'expected' => 0];
    }

    #[DataProvider('provideSubtractCases')]
    public function testSubtractRemovesValueFromNumber(float $initial, float $value, float $expected): void
    {
        $math = new Math();
        $math->number = $initial;

        $math->subtract($value);

        self::assertSame($expected, $math->number);
    }

    public static function provideSubtractCases(): \Generator
    {
        yield '10 - 5 = 5' => ['initial' => 10, 'value' => 5, 'expected' => 5];
        yield '5 - 10 = -5' => ['initial' => 5, 'value' => 10, 'expected' => -5];
    }

    #[DataProvider('provideMultiplyCases')]
    public function testMultiply(float $initial, float $value, float $expected): void
    {
        $math = new Math();
        $math->number = $initial;

        $math->multiply($value);

        self::assertSame($expected, $math->number);
    }

    public static function provideMultiplyCases(): \Generator
    {
        yield '3 * 4 = 12' => ['initial' => 3, 'value' => 4, 'expected' => 12];
        yield '5 * 0 = 0' => ['initial' => 5, 'value' => 0, 'expected' => 0];
    }

    #[DataProvider('provideDivideCases')]
    public function testDivide(float $initial, float $value, float $expected): void
    {
        $math = new Math();
        $math->number = $initial;

        $math->divide($value);

        self::assertSame($expected, $math->number);
    }

    public static function provideDivideCases(): \Generator
    {
        yield '10 / 2 = 5' => ['initial' => 10, 'value' => 2, 'expected' => 5];
        yield '7 / 1 = 7' => ['initial' => 7, 'value' => 1, 'expected' => 7];
    }
}
