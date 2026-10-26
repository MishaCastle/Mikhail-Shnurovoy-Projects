<?php

namespace App\Application\Service\Organization;

use App\Application\DTO\Organization\OrganizationDtoUpdate;
use App\Infrastructure\Model\Organization;

class OrganizationUpdateService
{
    public function update(OrganizationDtoUpdate $dto): void
    {
        Organization::updateRow($dto);
    }
}