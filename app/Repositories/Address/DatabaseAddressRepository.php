<?php

declare(strict_types=1);

namespace App\Repositories\Address;

use App\Models\Address;
use DB;

class DatabaseAddressRepository implements AddressRepositoryInterface
{
    public function save(Address $address): bool
    {
        return DB::table('addresses')
            ->insert([
                'name' => $address->name,
                'position' => \DB::raw("public.ST_GeomFromText('Point($address->position)', 4326)"),
            ]);
    }
}
