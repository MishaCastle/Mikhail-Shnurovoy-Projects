<?php

namespace App\Application\Dto\OrganizationUser;

final class OrganizationUserDtoCriteria
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $organizationId = null,
        public readonly ?int $userId = null,
    ) {
    }
}