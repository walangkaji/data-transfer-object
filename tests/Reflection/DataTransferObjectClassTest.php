<?php

namespace Walangkaji\DataTransferObject\Tests\Reflection;

use Walangkaji\DataTransferObject\DataTransferObject;
use Walangkaji\DataTransferObject\Reflection\DataTransferObjectClass;
use Walangkaji\DataTransferObject\Tests\TestCase;

class DataTransferObjectClassTest extends TestCase
{
    /** @test */
    public function test_public_properties()
    {
        $dto = new class () extends DataTransferObject {
            public $foo;

            public static $bar;

            private $baz;

            protected $boo;
        };

        $class = new DataTransferObjectClass($dto);

        $this->assertCount(1, $class->getProperties());
        $this->assertEquals('foo', $class->getProperties()[0]->name);
    }
}
