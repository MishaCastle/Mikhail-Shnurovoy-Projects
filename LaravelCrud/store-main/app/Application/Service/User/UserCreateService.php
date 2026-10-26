<?php

namespace App\Application\Service\User;

use App\Application\Dto\User\UserDtoCreate;
use App\Infrastructure\Model\User;

class UserCreateService
{
    public function create(UserDtoCreate $dto): void
    {
        User::createRow($dto);
    }
}