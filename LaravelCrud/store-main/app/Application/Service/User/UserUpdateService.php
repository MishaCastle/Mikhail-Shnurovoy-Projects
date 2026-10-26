<?php

namespace App\Application\Service\User;

use App\Application\Dto\User\UserDtoUpdate;
use App\Infrastructure\Model\User;

class UserUpdateService
{
    public function update(UserDtoUpdate $dto): void
    {
        User::updateRow($dto);
    }
}