<?php

declare(strict_types=1);

namespace Isocapi\Response;

use Isocapi\Source\SourceInterface;

class ResponseFactory
{
    public static function createBasedOnSource(string $response, SourceInterface $source): ResponseInterface
    {
        return match ($source->isPaginated()) {
            true => new PaginatedResponse($response),
            default => new SingleResponse($response),
        };
    }
}
