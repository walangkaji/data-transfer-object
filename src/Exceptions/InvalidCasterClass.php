<?php

namespace Walangkaji\DataTransferObject\Exceptions;

use Exception;
use Walangkaji\DataTransferObject\Caster;

class InvalidCasterClass extends Exception
{
    public function __construct(string $className)
    {
        $expected = Caster::class;

        parent::__construct(
            "Class `{$className}` doesn't implement {$expected} and can't be used as a caster"
        );
    }
}
