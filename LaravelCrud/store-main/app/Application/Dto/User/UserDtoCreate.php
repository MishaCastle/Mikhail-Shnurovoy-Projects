<?php

namespace App\Application\Dto\User;

final class UserDtoCreate
{
    public function __construct(
        public readonly string $firstName,
        public readonly string $secondName,
        public readonly string $email,
        public readonly ?string $phone,
        public readonly string $login,
        public readonly string $password,

    ) {
    }
}