<?php

namespace App\Application\Service\OrganizationUser;

use App\Application\Dto\OrganizationUser\OrganizationUserDtoUpdate;
use App\Infrastructure\Model\OrganizationUser;

class OrganizationUserUpdateService
{
    public function update(OrganizationUserDtoUpdate $dto): void
    {
        OrganizationUser::updateRow($dto);
    }
}