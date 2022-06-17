<?php

namespace Walangkaji\DataTransferObject\Tests\Dummy;

use Walangkaji\DataTransferObject\DataTransferObject;

class ComplexDtoWithCastedAttributeHavingCast extends DataTransferObject
{
    public string $name;

    public ComplexDtoWithCast $other;
}
