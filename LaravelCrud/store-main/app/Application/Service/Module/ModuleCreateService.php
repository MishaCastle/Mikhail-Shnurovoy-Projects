<?php

namespace App\Application\Service\Module;

use App\Application\Dto\Module\ModuleDtoCreate;
use App\Infrastructure\Model\Module;

class ModuleCreateService
{
    public static function create(ModuleDtoCreate $dto): void
    {
        Module::createRow($dto);
    }
}