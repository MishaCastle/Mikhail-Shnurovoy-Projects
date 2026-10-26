<?php

namespace App\Application\Service\Module;

use App\Application\Dto\Module\ModuleDtoUpdate;
use App\Infrastructure\Model\Module;

class ModuleUpdateService
{
    public static function update(ModuleDtoUpdate $dto): void
    {
        Module::updateRow($dto);
    }
}