<?php

namespace App\Application\Dto\Module;

class ModuleDtoCreate
{
     public function __construct(
        public readonly ?string $name = null,
        public readonly ?float $price = null){
    }
}