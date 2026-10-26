<?php

namespace App\Application\Service\OrganizationUser;

use App\Infrastructure\Model\OrganizationUser;

class OrganizationUserDeleteService
{
    public function delete(int $id): void
    {
        OrganizationUser::deleteRow($id);
    }
}