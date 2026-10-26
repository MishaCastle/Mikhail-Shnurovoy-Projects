<?php


namespace App\Application\Dto\Module;

use DateTimeImmutable;

final class ModuleDtoCriteria
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?float $priceFrom = null,
        public readonly ?float $priceTo = null,
        public readonly ?DateTimeImmutable $createdFrom = null,
        public readonly ?DateTimeImmutable $createdTo = null,
    ) {
    }
}
  