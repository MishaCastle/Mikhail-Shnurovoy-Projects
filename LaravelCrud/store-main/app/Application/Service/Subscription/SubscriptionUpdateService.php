<?php

namespace App\Application\Service\Subscription;

use App\Application\Dto\Subscription\SubscriptionDtoUpdate;
use App\Infrastructure\Model\Subscription;

class SubscriptionUpdateService
{
    public function update(SubscriptionDtoUpdate $dto): void
    {
        Subscription::updateRow($dto);
    }
}