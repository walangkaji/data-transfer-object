<?php

namespace Walangkaji\DataTransferObject\Tests\Dummy;

use Walangkaji\DataTransferObject\DataTransferObject;

class ComplexDtoWithNullableProperty extends DataTransferObject
{
    public string $name;

    public ?BasicDto $other;
}
