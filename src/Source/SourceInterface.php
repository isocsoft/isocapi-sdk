<?php

declare(strict_types=1);

namespace App\Source;

interface SourceInterface
{
    public function method(): string;

    public function url(): string;

    public function options(): array;
    
    public function isPaginated(): bool;
}
