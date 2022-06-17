<?php

namespace Walangkaji\DataTransferObject\Tests\Dummy;

use Walangkaji\DataTransferObject\DataTransferObject;

class ComplexDto extends DataTransferObject
{
    public string $name;

    public BasicDto $other;
}
