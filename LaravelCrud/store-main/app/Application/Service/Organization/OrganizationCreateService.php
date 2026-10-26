<?php

namespace App\Application\Service\Organization;

use App\Application\DTO\Organization\OrganizationDtoCreate;
use App\Infrastructure\Model\Organization;

class OrganizationCreateService
{
    public function create(OrganizationDtoCreate $dto): void
    {
        Organization::createRow($dto);
    }
}