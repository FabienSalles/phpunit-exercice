<?php

declare(strict_types=1);

namespace Conveycode\PhpunitExercice;

interface HttpClient
{
    public function get(string $url): string;
}
