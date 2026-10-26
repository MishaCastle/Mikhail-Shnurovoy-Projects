<?php

namespace App\Application\Service\Subscription;

use App\Application\Dto\Subscription\SubscriptionDtoCriteria;
use App\Infrastructure\Model\Subscription;
use Illuminate\Database\Eloquent\Collection;

class SubscriptionReadService
{
    public function readAll(): Collection
    {
        return Subscription::all();
    }

    public function read(SubscriptionDtoCriteria $dto): Collection
    {
        return Subscription::search($dto);
    }
}