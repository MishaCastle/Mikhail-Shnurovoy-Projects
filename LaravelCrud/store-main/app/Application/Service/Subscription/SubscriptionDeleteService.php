<?php

namespace App\Application\Service\Subscription;

use App\Infrastructure\Model\Subscription;

class SubscriptionDeleteService
{
    public function delete(int $id): void
    {
        Subscription::deleteRow($id);
    }
}