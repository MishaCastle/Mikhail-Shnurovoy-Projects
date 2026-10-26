<?php

namespace App\Application\Dto\Organization;

use DateTimeImmutable;

final class OrganizationDtoCriteria
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?string $postCode = null,
        public readonly ?string $country = null,
        public readonly ?string $city = null,
        public readonly ?string $street = null,
        public readonly ?string $number = null,
        public readonly ?DateTimeImmutable $createdFrom = null,
        public readonly ?DateTimeImmutable $createdTo = null,
    ) {
    }
}