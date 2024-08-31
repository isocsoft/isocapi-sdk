<?php

declare(strict_types=1);

namespace App\Response;

interface ResponseInterface
{
    public function json(): string;

    public function toArray(): array;

    public function error(): false|string;

    public function message(): string;

    public function isSuccessful(): bool;

    public function data(): array;
}
