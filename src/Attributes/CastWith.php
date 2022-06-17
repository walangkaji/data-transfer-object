<?php

namespace Walangkaji\DataTransferObject\Attributes;

use Attribute;
use Walangkaji\DataTransferObject\Caster;
use Walangkaji\DataTransferObject\Exceptions\InvalidCasterClass;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_PROPERTY)]
class CastWith
{
    public array $args;

    public function __construct(
        public string $casterClass,
        mixed ...$args
    ) {
        if (! is_subclass_of($this->casterClass, Caster::class)) {
            throw new InvalidCasterClass($this->casterClass);
        }

        $this->args = $args;
    }
}
