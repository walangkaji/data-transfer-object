<?php

namespace Walangkaji\DataTransferObject\Tests\Dummy;

use Walangkaji\DataTransferObject\Attributes\Strict;
use Walangkaji\DataTransferObject\DataTransferObject;

#[Strict]
class ComplexStrictDto extends DataTransferObject
{
    public string $name;

    public BasicDto $other;
}
