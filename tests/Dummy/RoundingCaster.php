<?php

namespace Walangkaji\DataTransferObject\Tests\Dummy;

use Walangkaji\DataTransferObject\Caster;

class RoundingCaster implements Caster
{
    public function cast(mixed $value): float | int
    {
        return is_int($value) ? $value : round($value, 2);
    }
}
