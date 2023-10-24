<?php

declare(strict_types=1);

namespace App\DTO;


class AddressDto
{
    public function __construct(public readonly string $address = '')
    {
    }
}
