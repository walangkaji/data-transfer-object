<?php

namespace Walangkaji\DataTransferObject\Tests\Dummy;

use Walangkaji\DataTransferObject\DataTransferObject;

class ComplexDtoWithSelf extends DataTransferObject
{
    public string $name;

    public ?self $other;
}
