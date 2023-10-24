<?php

declare(strict_types=1);

namespace App\Repositories\Address;

use App\Models\Address;

interface AddressRepositoryInterface
{
    public function save(Address $address): bool;
}
