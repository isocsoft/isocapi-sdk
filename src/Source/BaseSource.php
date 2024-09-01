<?php

declare(strict_types=1);

namespace Isocapi\Source;

use Override;
use Symfony\Component\HttpFoundation\Request;

abstract class BaseSource implements SourceInterface
{
    public function __construct(
        protected readonly array $body,
    ) {
    }

    #[Override]
    public function method(): string
    {
        return Request::METHOD_POST;
    }

    #[Override]
    public function options(): array
    {
        return [
            'json' => $this->body
        ];
    }
}
