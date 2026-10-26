<?php

namespace App\Application\Service\Organization;

use App\Application\DTO\Organization\OrganizationDtoCriteria;
use App\Infrastructure\Model\Organization;
use Illuminate\Database\Eloquent\Collection;

class OrganizationReadService
{
    public function readAll()
    {
        return Organization::all();
    }

    public function read(OrganizationDtoCriteria $dto)
    {
        return Organization::search($dto);
    }
}