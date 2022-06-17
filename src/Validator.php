<?php

namespace Walangkaji\DataTransferObject;

use Walangkaji\DataTransferObject\Validation\ValidationResult;

interface Validator
{
    public function validate(mixed $value): ValidationResult;
}
