<?php

namespace App\Application\Service\User;


use App\Infrastructure\Model\User;

class UserDeleteService
{
    public function delete(int $id): void
    {
        User::deleteRow($id);
    }
}