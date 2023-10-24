<?php

declare(strict_types=1);

namespace App\Services\requestAddress;

use App\Clients\AddressClientInterface;
use App\Clients\YandexAddressClient;
use App\DTO\AddressDto;
use App\Models\Address;
use App\Repositories\Address\AddressRepositoryInterface;
use App\Repositories\Address\DatabaseAddressRepository;
use GuzzleHttp\Exception\GuzzleException;

class RequestAddressService
{

    private bool $status = false;

    public function __construct(
        public readonly AddressClientInterface $client = new YandexAddressClient(),
        public readonly AddressRepositoryInterface $repository = new DatabaseAddressRepository()
    ) {
    }

    /**
     * @throws GuzzleException
     */
    public function run(AddressDto $dto): bool
    {
        $this->client->request($dto);
        $response = $this->client->getResponse();

        if ($response === null) {
            return false;
        }

        $addressModel = new Address();
        $addressModel->name = $dto->address;
        $addressModel->position = $response->point;

        return $this->repository->save($addressModel);
    }
}
