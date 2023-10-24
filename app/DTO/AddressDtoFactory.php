<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\Request;

class AddressDtoFactory
{
    static function createFromRequest(Request $request): AddressDto
    {
        return new AddressDto($request->post('address'));
    }
}
