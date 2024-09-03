<?php

declare(strict_types=1);

namespace Isocapi;

use Isocapi\Response\ResponseFactory;
use Isocapi\Response\ResponseInterface;
use Isocapi\Source\SourceInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface as HttpClientResponseInterface;
use Throwable;

class ApiClient
{
    private const string URL = 'https://isocapi.com/api/v1';
    private const string API_KEY_HEADER = 'X-ISOCAPI-KEY';
    private readonly HttpClientInterface $client;

    public function __construct(string $apiKey)
    {
        $this->client = HttpClient::createForBaseUri(
            baseUri: self::URL,
            defaultOptions: [
                'headers' => [
                    self::API_KEY_HEADER => $apiKey
                ]
            ]
        );
    }

    public function request(SourceInterface $source, array $extraOptions = []): ResponseInterface
    {
        $response = $this->client->request(
            method: $source->method(),
            url: self::URL . $source->url(),
            options: array_merge($source->options(), $extraOptions),
        );
        return ResponseFactory::createBasedOnSource(
            response: $response->getContent(),
            source: $source,
        );
    }
}
