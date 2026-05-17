<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

final class ChuckNorrisGuzzleHttpClient implements HttpClient
{
    public function __construct(
        private readonly ClientInterface $client = new Client(),
    ) {
    }

    public function get(string $url): string
    {
        return (string) $this->client->request('GET', $url)->getBody();
    }
}
