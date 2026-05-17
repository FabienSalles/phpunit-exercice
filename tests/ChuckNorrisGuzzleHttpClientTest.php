<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice\Tests;

use Conveycode\PhpunitExercice\ChuckNorrisGuzzleHttpClient;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

/**
 * Test d'intégration : touche la vraie API.
 */
#[Group('integration')]
final class ChuckNorrisGuzzleHttpClientTest extends TestCase
{
    public function testGetReturnsExpectedCategoriesFromApi(): void
    {
        $client = new ChuckNorrisGuzzleHttpClient();

        $response = $client->get('https://api.chucknorris.io/jokes/categories');

        self::assertJsonStringEqualsJsonString(
            <<<'JSON'
            [
                "animal",
                "career",
                "celebrity",
                "dev",
                "explicit",
                "fashion",
                "food",
                "historical",
                "money",
                "movie",
                "music",
                "political",
                "religion",
                "science",
                "sport",
                "travel"
            ]
            JSON,
            $response,
        );
    }
}
