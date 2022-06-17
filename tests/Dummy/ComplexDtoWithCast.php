<?php

namespace Walangkaji\DataTransferObject\Tests\Dummy;

use Walangkaji\DataTransferObject\Attributes\DefaultCast;
use Walangkaji\DataTransferObject\DataTransferObject;

#[DefaultCast(ComplexObject::class, ComplexObjectCaster::class)]
class ComplexDtoWithCast extends DataTransferObject
{
    public string $name;

    public ComplexObject $object;
}
