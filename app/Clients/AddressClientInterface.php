<?php

declare(strict_types=1);

namespace App\Clients;

use App\DTO\AddressDto;
use App\DTO\AddressResponseDto;

interface AddressClientInterface
{
    public function request(AddressDto $dto): void;
    public function getResponse(): ?AddressResponseDto;
}
