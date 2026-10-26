<?php

namespace App\Application\Service\Subscription;

use App\Application\Dto\Subscription\SubscriptionDtoCreate;
use App\Infrastructure\Model\Subscription;

class SubscriptionCreateService
{
    public function create(SubscriptionDtoCreate $dto): void
    {
        Subscription::createRow($dto);
    }
}