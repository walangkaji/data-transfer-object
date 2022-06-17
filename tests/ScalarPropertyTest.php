<?php

namespace Walangkaji\DataTransferObject\Tests;

use Walangkaji\DataTransferObject\DataTransferObject;

class ScalarPropertyTest extends TestCase
{
    /** @test */
    public function scalar_property_can_be_set()
    {
        $dto = new ScalarPropertyDto(foo: 1);

        $this->assertEquals(1, $dto->foo);
    }
}

class ScalarPropertyDto extends DataTransferObject
{
    public int $foo;
}
