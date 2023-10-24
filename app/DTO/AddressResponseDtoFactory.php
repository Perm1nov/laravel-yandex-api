<?php

declare(strict_types=1);

namespace App\DTO;

class AddressResponseDtoFactory
{
    public static function createFromResponse(array $jsonData): AddressResponseDto
    {
        $point = null;

        $response = $jsonData['response'];
        $geoObjectCollection = $response['GeoObjectCollection'];
        $objects = $geoObjectCollection['featureMember'];
        if (count($objects) > 0) {
            $firstObject = array_shift($objects);
            if ($firstObject !== null) {
                $point = $firstObject['GeoObject']['Point']['pos'];
            }
        }

        return new AddressResponseDto($point);
    }
}
