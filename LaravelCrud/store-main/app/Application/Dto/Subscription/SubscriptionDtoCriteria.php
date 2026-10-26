<?php

namespace App\Application\Dto\Subscription;

use DateTimeImmutable;

final class SubscriptionDtoCriteria
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $organizationId = null,
        public readonly ?int $moduleId = null,
        public readonly ?DateTimeImmutable $dateStartFrom = null,
        public readonly ?DateTimeImmutable $dateStartTo = null,
        public readonly ?DateTimeImmutable $dateFinishFrom = null,
        public readonly ?DateTimeImmutable $dateFinishTo = null,
        public readonly ?bool $isActive = null,
        public readonly ?DateTimeImmutable $createdFrom = null,
        public readonly ?DateTimeImmutable $createdTo = null,
    ) {
    }
}