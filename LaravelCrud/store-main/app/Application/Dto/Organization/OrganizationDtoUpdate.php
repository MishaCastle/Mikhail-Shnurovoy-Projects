<?php

namespace App\Application\Dto\Organization;

final class OrganizationDtoUpdate
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $postCode,
        public readonly string $country,
        public readonly string $city,
        public readonly string $street,
        public readonly string $number,
    ) {
    }
}