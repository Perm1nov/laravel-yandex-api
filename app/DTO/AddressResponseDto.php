<?php

declare(strict_types=1);

namespace App\DTO;

class AddressResponseDto
{
    public function __construct(public readonly ?string $point = null)
    {
    }
}
