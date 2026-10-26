<?php

namespace App\Application\Dto\User;

use DateTimeImmutable;

final class UserDtoCriteria
{
    public function __construct(
        public readonly ?int $id = null,

        public readonly ?string $firstName = null,
        public readonly ?string $secondName = null,

        public readonly ?string $email = null,
        public readonly ?string $phone = null,

        public readonly ?string $login = null,

        public readonly ?bool $isVerifyEmail = null,
        public readonly ?bool $isVerifyPhone = null,

        public readonly ?DateTimeImmutable $createdFrom = null,
        public readonly ?DateTimeImmutable $createdTo = null,
    ) {
    }
}