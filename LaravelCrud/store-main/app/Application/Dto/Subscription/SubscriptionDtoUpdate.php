<?php

namespace App\Application\Dto\Subscription;

use DateTimeImmutable;

final class SubscriptionDtoUpdate
{
    public function __construct(
        public readonly int $id,
        public readonly int $organizationId,
        public readonly int $moduleId,
        public readonly DateTimeImmutable $dateStart,
        public readonly DateTimeImmutable $dateFinish,
        public readonly bool $isActive,
    ) {
    }
}