<?php

namespace App\Application\Dto\Module;

class ModuleDtoUpdate
{
     public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?float $price = null){
    }
}