<?php

namespace App\Application\Dto\Subscription;

use DateTimeImmutable;

final class SubscriptionDtoCreate
{
    public function __construct(
        public readonly int $organizationId,
        public readonly int $moduleId,
        public readonly DateTimeImmutable $dateStart,
        public readonly DateTimeImmutable $dateFinish,
        public readonly bool $isActive,
    ) {
    }
}