<?php

namespace App\Application\Service\OrganizationUser;

use App\Application\Dto\OrganizationUser\OrganizationUserDtoCriteria;
use App\Infrastructure\Model\OrganizationUser;
use Illuminate\Database\Eloquent\Collection;

class OrganizationUserReadService
{
    public function readAll(): Collection
    {
        return OrganizationUser::all();
    }

    public function read(OrganizationUserDtoCriteria $dto): Collection
    {
        return OrganizationUser::search($dto);
    }
}