<?php

namespace App\Application\Service\Organization;

use App\Infrastructure\Model\Organization;

class OrganizationDeleteService
{
    public function delete(int $id): void
    {
        Organization::deleteRow($id);
    }
}