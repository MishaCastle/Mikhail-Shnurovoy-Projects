<?php

namespace App\Application\Service\User;

use App\Application\Dto\User\UserDtoCriteria;
use App\Infrastructure\Model\User;

class UserReadService
{
    public function read(UserDtoCriteria $dto)
    {
        return User::search($dto);
    }
     public function readFirstThousand( )
    {
        return User::limit(1000)->get();
    }
    public function readAll( )
    {
        return User::all();
    }
}