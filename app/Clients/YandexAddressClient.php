<?php

declare(strict_types=1);

namespace App\Clients;

use App\DTO\AddressDto;
use App\DTO\AddressResponseDto;
use App\DTO\AddressResponseDtoFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Log;
use Psr\Http\Message\ResponseInterface;

class YandexAddressClient implements AddressClientInterface
{
    private string $apiKey;
    private Client $client;
    private ?ResponseInterface $response = null;

    public function __construct(?string $apiKey = null)
    {
        $this->apiKey = env('YANDEX_API_KEY', '');
        $this->client = new Client();
    }

    /**
     * @throws GuzzleException
     */
    public function request(AddressDto $dto): void
    {
        try {
            $this->response = $this->client->request('GET', 'https://geocode-maps.yandex.ru/1.x', [
                'query' => [
                    'geocode' => $dto->address,
                    'apikey' => $this->apiKey,
                    'format' => 'json'
                ],
            ]);
        } catch (RequestException $exception) {
            Log::error($exception->getMessage());
        }
    }

    public function getResponse(): ?AddressResponseDto
    {
        if ($this->response === null) {
            return null;
        }

        $jsonData = json_decode($this->response->getBody()->getContents(), true);

        return AddressResponseDtoFactory::createFromResponse($jsonData);
    }
}
