<?php

namespace Walangkaji\DataTransferObject;

interface Caster
{
    public function cast(mixed $value): mixed;
}
