<?php

declare(strict_types=1);

namespace App;

use App\Response\ResponseFactory;
use App\Response\ResponseInterface;
use App\Source\SourceInterface;
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
            response: $this->getContent($response),
            source: $source,
        );
    }

    private function getContent(HttpClientResponseInterface $response): string
    {
        try {
            return $response->getContent();
        } catch (Throwable) {
            return '';
        }
    }
}
