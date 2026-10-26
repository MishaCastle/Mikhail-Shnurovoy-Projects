<?php

namespace App\Application\Service\Module;


use App\Infrastructure\Model\Module;

class ModuleDeleteService
{
    public static function delete(int $id): void
    {
        Module::deleteRow($id);
    }
}