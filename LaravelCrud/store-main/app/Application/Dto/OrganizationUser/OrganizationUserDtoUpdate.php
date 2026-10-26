<?php

namespace App\Application\Dto\OrganizationUser;

final class OrganizationUserDtoUpdate
{
    public function __construct(
        public readonly int $id,
        public readonly int $organizationId,
        public readonly int $userId,
    ) {
    }
}