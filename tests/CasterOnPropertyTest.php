<?php

namespace Walangkaji\DataTransferObject\Tests;

use Walangkaji\DataTransferObject\Attributes\CastWith;
use Walangkaji\DataTransferObject\DataTransferObject;
use Walangkaji\DataTransferObject\Tests\Dummy\ComplexObject;
use Walangkaji\DataTransferObject\Tests\Dummy\ComplexObjectCaster;

class CasterOnPropertyTest extends TestCase
{
    /** @test */
    public function property_is_casted()
    {
        $dto = new class (complexObject: [ 'name' => 'test' ]) extends DataTransferObject {
            #[CastWith(ComplexObjectCaster::class)]
            public ComplexObject $complexObject;
        };

        $this->assertEquals('test', $dto->complexObject->name);
    }
}
