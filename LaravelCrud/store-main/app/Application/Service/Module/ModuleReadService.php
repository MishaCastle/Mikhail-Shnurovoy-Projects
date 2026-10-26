<?php

namespace App\Application\Service\Module;

use App\Application\Dto\Module\ModuleDtoCriteria;
use App\Infrastructure\Model\Module;

class ModuleReadService
{
    public static function read(ModuleDtoCriteria $dto)
    {
        return Module::search($dto);
    }
     public static function readAll( )
    {
        return Module::all();
    }
}