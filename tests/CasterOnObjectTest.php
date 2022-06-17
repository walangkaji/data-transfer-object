<?php

namespace Walangkaji\DataTransferObject\Tests;

use Walangkaji\DataTransferObject\DataTransferObject;
use Walangkaji\DataTransferObject\Tests\Dummy\ComplexObjectWithCaster;

class CasterOnObjectTest extends TestCase
{
    /** @test */
    public function property_is_casted()
    {
        $dto = new class (complexObject: [ 'name' => 'test' ]) extends DataTransferObject {
            public ComplexObjectWithCaster $complexObject;
        };

        $this->assertEquals('test', $dto->complexObject->name);
    }
}
