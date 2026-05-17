<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice\Tests;

use Conveycode\PhpunitExercice\ChuckNorrisClient;
use Conveycode\PhpunitExercice\ChuckNorrisGuzzleHttpClient;
use Conveycode\PhpunitExercice\HttpClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;

final class ChuckNorrisClientTest extends TestCase
{
    use ProphecyTrait;

    /**
     * Test unitaire avec un MockHandler Guzzle.
     */
    public function testGetJokesCategoriesReturnsRawApiValues(): void
    {
        $mockHandler = new MockHandler([
            new Response(200, [], '["explicit","sport","food"]'),
        ]);
        $guzzleClient = new Client(['handler' => HandlerStack::create($mockHandler)]);
        $httpClient = new ChuckNorrisGuzzleHttpClient($guzzleClient);
        $sut = new ChuckNorrisClient($httpClient);

        self::assertSame(['explicit', 'sport', 'food'], $sut->getJokesCategories());
    }

    /**
     * Test unitaire avec un stub Prophecy de HttpClient.
     */
    public function testGetJokesCategoriesCallsExpectedUrl(): void
    {
        $httpClient = $this->prophesize(HttpClient::class);
        $httpClient->get(Argument::any())->willReturn('[]');

        $sut = new ChuckNorrisClient($httpClient->reveal());
        $sut->getJokesCategories();

        $httpClient->get('https://api.chucknorris.io/jokes/categories')->shouldHaveBeenCalled();
    }

    /**
     * Test d'intégration : appel réel à l'API.
     */
    #[Group('integration')]
    public function testGetJokesCategoriesFromRealApi(): void
    {
        $sut = new ChuckNorrisClient(new ChuckNorrisGuzzleHttpClient());

        $categories = $sut->getJokesCategories();

        self::assertContains('explicit', $categories);
    }
}
