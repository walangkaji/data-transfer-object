<?php

namespace Walangkaji\DataTransferObject\Tests\Dummy;

use Walangkaji\DataTransferObject\Attributes\CastWith;

#[CastWith(ComplexObjectWithCasterCaster::class)]
class ComplexObjectWithCaster
{
    public function __construct(
        public string $name,
    ) {
    }
}
