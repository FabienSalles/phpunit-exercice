<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice;

final class ChuckNorrisClient
{
    private const CATEGORIES_URL = 'https://api.chucknorris.io/jokes/categories';

    public function __construct(
        private readonly HttpClient $httpClient,
    ) {
    }

    /**
     * @return list<string>
     */
    public function getJokesCategories(): array
    {
        $json = $this->httpClient->get(self::CATEGORIES_URL);

        /** @var list<string> $categories */
        $categories = json_decode($json, true, flags: JSON_THROW_ON_ERROR);

        return $categories;
    }
}
