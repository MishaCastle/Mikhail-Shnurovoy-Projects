<?php

namespace App\Application\Service\OrganizationUser;

use App\Application\Dto\OrganizationUser\OrganizationUserDtoCreate;
use App\Infrastructure\Model\OrganizationUser;

class OrganizationUserCreateService
{
    public function create(OrganizationUserDtoCreate $dto): void
    {
        OrganizationUser::createRow($dto);
    }
}