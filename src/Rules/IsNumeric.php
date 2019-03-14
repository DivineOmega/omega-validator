<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsNumeric implements Rule
{
    public function passes(string $key, $value): bool
    {
        return is_numeric($value);
    }

    public function message(): string
    {
        return 'The :key must be numeric.';
    }
}