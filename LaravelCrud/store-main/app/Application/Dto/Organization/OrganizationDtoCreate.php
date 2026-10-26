<?php

namespace App\Application\Dto\Organization;

final class OrganizationDtoCreate
{
    public function __construct(
        public readonly string $name,
        public readonly string $postCode,
        public readonly string $country,
        public readonly string $city,
        public readonly string $street,
        public readonly string $number,
    ) {
    }
}