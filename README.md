# isocapi SDK
The isocapi-sdk library provides convenient access to the isocapi API from apps written in PHP.
It includes client with multiple convenient methods to obtain data you need.

## Isocapi documentantion
See our page: [Isocapi](https://isocapi.com/docs/)

## Instalation
```sh
composer require isocsoft/isocapi-sdk
```

#### Requirements
- PHP 8.3

## Usage:
<details open>
    <summary><b>synchronous</b></summary> 

```php
$client = new ApiClient('your-isocapi-key');

$response = $client->request(
    source: new Olx\AuctionsDetailsByKeyword([
        'keyword' => 'Nike',
        'page' => 1,
    ];
);

return $response->toArray();
```
</details>

## Support
If you have encountered a bug or have any ideas how to improve this library - don't be afraid to open an [issue](https://github.com/isocsoft/pyisocapi/issues/new) with an explanation.
