<?php

namespace App\Application\Dto\OrganizationUser;

final class OrganizationUserDtoCreate
{
    public function __construct(
        public readonly int $organizationId,
        public readonly int $userId,
    ) {
    }
}