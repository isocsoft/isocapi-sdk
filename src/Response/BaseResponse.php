<?php

declare(strict_types=1);

namespace App\Response;

abstract class BaseResponse implements ResponseInterface
{
    private ?array $decodedResponse = null;

    public function __construct(
        private readonly string $response,
    ) {
    }

    public function json(): string
    {
        return $this->response;
    }

    public function toArray(): array
    {
        return $this->decodedResponse();
    }

    public function error(): false|string
    {
        if (($error = $this->decodedResponse()['error']) === '') {
            return false;
        }
        return $error;
    }

    public function message(): string
    {
        return $this->decodedResponse()['message'];
    }

    public function isSuccessful(): bool
    {
        return $this->decodedResponse()['success'];
    }

    public function data(): array
    {
        return $this->decodedResponse()['data'];
    }

    private function decodedResponse(): array
    {
        if ($this->decodedResponse === null) {
            $this->decodedResponse = json_decode($this->response, true);
        }
        return $this->decodedResponse;
    }
}
